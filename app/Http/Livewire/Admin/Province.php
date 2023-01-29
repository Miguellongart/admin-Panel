<?php

namespace App\Http\Livewire\Admin;

use App\Models\Province as ModelsProvince;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Province extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $country_id;
    public $nombre,$name,$nom,$iso2,$iso3,$phone_code, $pageTitle;
    public $controlador = "Provincia";

    public function render()
    {
        $rows = ModelsProvince::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
            
        return view('livewire.admin.province', [
            'rows' => $rows,
        ]);
    }

    public function createProvince()
    {
        $this->pageTitle = "cargar CSV ".$this->controlador;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function saveProvince()
    {   
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Creado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function editProvince(int $province_id)
    {
        $this->pageTitle = "Editar ".$this->controlador;
        $row = ModelsProvince::find($province_id);
        if($row){
            $this->nombre = $row->nombre;
            $this->name = $row->name;
            $this->iso2 = $row->iso2;
            $this->iso3 = $row->iso3;
            $this->country_id = $row->country_id;
            $this->dispatchBrowserEvent('open-modal');
        }else{
            return redirect()->to('/user');
        }
    }

    public function updateProvince()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $row = ModelsProvince::find($this->province_id);
        $row->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $row->syncRoles($this->roleSave);
        
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Actualizado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    public function destroyProvince($id)
    {
        ModelsProvince::find($id)->delete();
    }
    
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->csv = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
