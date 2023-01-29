<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RoleShow extends Component
{
    use WithPagination;

    public $search;
    public $pageTitle, $name, $description, $guard_name,$role_id;
    public $permissions = [];
    public $permissionsSave = [];
    public $controlador = "Rol";
    public $roleNow = [];

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'permissions' => ['required', 'array'],
            'guard_name' => ['required', 'string'],
        ];
    }

    public function render()
    {
        $rows = Role::paginate(10);
        return view('livewire.role-show', [
            'rows' => $rows,
        ]);
    }

    public function createRole()
    {
        $this->pageTitle = "Crear ".$this->controlador;
        $perm = Permission::all();
        $role = new Role();
        $this->permissions = $perm;
        $this->roleNow = $role;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function saveRole()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
            'description' => $this->description,
            'guard_name' => $this->guard_name,
        ]);

        $role->syncPermissions($this->permissionsSave);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Creado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }
    public function editRole(int $role_id)
    {
        $this->pageTitle = "Editar ".$this->controlador;
        $role = Role::find($role_id);
        $perm = Permission::all();
        if($role){
            $this->permissions = $perm;
            $this->role_id = $role->id;
            $this->name = $role->name;
            $this->description = $role->description;
            $this->guard_name = $role->guard_name;
            $this->roleNow = $role;
            $this->permissionsSave = $role->permissions->pluck('id')->all();
            $this->dispatchBrowserEvent('open-modal');
        }else{
            return redirect()->to('/roles');
        }
    }

    public function updateRole()
    {
        $this->validate();
        $role = Role::find($this->role_id);
        $role->update([
            'name' => $this->name,
            'description' => $this->description,
            'guard_name' => $this->guard_name,
        ]);
        $role->syncPermissions($this->permissionsSave);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Actualizado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function destroyRole($id)
    {
        Role::find($id)->delete();
    }
    
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->description = '';
        $this->guard_name = '';
        $this->permissionsSave = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
