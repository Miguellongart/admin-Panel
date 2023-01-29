<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class UserShow extends Component
{
    use WithPagination;

    public $search;
    public $pageTitle, $name, $email,$user_id;
    public $roles = [];
    public $roleSave = [];
    public $userNow = [];
    public $controlador = "Usuarios";

    public function render()
    {
        $rows = User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(10);
        return view('livewire.user-show', [
            'rows' => $rows,
        ]);
    }

    public function createUser()
    {
        $this->pageTitle = "Crear ".$this->controlador;
        $role = Role::all();
        $this->roles = $role;
        $this->userNow = new User();
        $this->dispatchBrowserEvent('open-modal');
    }

    public function saveUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);

        $user->syncRoles($this->roleSave);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Creado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function editUser(int $user_id)
    {
        $this->pageTitle = "Editar ".$this->controlador;
        $user = User::find($user_id);
        $role = Role::all();
        if($user){
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->roles = $role;
            $this->roleSave = $user->roles->pluck('id')->all();
            $this->dispatchBrowserEvent('open-modal');
        }else{
            return redirect()->to('/user');
        }
    }

    public function updateUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $user->syncRoles($this->roleSave);
        
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Actualizado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function destroyUser($id)
    {
        User::find($id)->delete();
    }
    
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->roleSave = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
