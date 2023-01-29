<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Livewire\WithPagination;

class PermissionShow extends Component
{
    use WithPagination;

    public $search;
    public $pageTitle, $name, $guard_name,$description,$permission_id;
    public $controlador = "Permiso";

    public function render()
    {
        $rows = Permission::paginate(10);
        return view('livewire.permission-show', [
            'rows' => $rows,
        ]);
    }

    public function createPermission()
    {

        $this->pageTitle = "Crear ".$this->controlador;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function savePermission()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'guard_name' => ['required', 'string'],
        ]);

        Permission::create([
            'name' => $this->name,
            'description' => $this->description,
            'guard_name' => $this->guard_name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Creado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function editPermission(int $permission_id)
    {
        $row = Permission::find($permission_id);
        $this->pageTitle = "Editar ".$this->controlador;
        if($row){
            $this->permission_id = $row->id;
            $this->name = $row->name;
            $this->description = $row->description;
            $this->guard_name = $row->guard_name;
        }else{
            return redirect()->to('/permission');
        }
    }

    public function updatePermission()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'guard_name' => ['required', 'string'],
        ]);

        Permission::where('id',$this->permission_id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'guard_name' => $this->guard_name,
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Actualizado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function destroyPermission($id)
    {
        Permission::find($id)->delete();
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
        $this->dispatchBrowserEvent('close-modal');
    }
}
