<?php

namespace App\Http\Livewire\Admin;

use App\Models\Country as ModelsCountry;
use App\Models\Province;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Country extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $nombre,$name,$nom,$iso2,$iso3,$phone_code, $pageTitle;
    public $controlador = "Pais";
    public $provinceCountry = [];

    public function render()
    {
        $rows = ModelsCountry::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);
            
        return view('livewire.admin.country', [
            'rows' => $rows,
        ]);
    }

    public function createCountry()
    {
        $this->pageTitle = "cargar CSV ".$this->controlador;
        $this->dispatchBrowserEvent('open-modal');
    }

    public function saveCountry()
    {   
        $path = json_decode(file_get_contents(public_path('jsons/countrys.json'), true));
        foreach($path as $item){
            if(ModelsCountry::where('name', 'like', '%'.$item->name.'%')){
                $this->dispatchBrowserEvent('swal:modal', [
                    'type' => 'warning',  
                    'message' => 'Paises Exitentes!', 
                    'text' => 'Aparecerá en la tabla pronto.'
                ]);
            }else{
                ModelsCountry::create([
                    'nombre' => $item->nombre,
                    'name' => $item->name,
                    'nom' => $item->nom,
                    'iso2' => $item->iso2,
                    'iso3' => $item->iso3,
                    'phone_code' => $item->phone_code,
                ]);
            }
        }
        $this->resetInput();
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',  
            'message' => 'Creado con Exito!', 
            'text' => 'Aparecerá en la tabla pronto.'
        ]);
    }

    // public function saveEstados(int $id)
    // {   
    //     // dd($id);
    //     $path = json_decode(file_get_contents(public_path('jsons/mx.json'), true));
    //     foreach($path as $item){
    //         Province::create([
    //             'nombre' => $item->subdivision_name,
    //             'name' => $item->subdivision,
    //             'iso2' => $item->code,
    //             'iso3' => $item->Local,
    //             'country_id' => $id
    //         ]);
    //     }
    //     $this->resetInput();
    //     $this->dispatchBrowserEvent('close-modal');
    //     $this->dispatchBrowserEvent('swal:modal', [
    //         'type' => 'success',  
    //         'message' => 'Creado con Exito!', 
    //         'text' => 'Aparecerá en la tabla pronto.'
    //     ]);
    // }

    public function viewProvince(int $country_id)
    {
        $this->pageTitle = "Ver Provincias / Distritos ";
        $row = ModelsCountry::find($country_id);
        if($row){
            $this->provinceCountry = $row->provinceNxM;
            $this->dispatchBrowserEvent('open-modal');
        }else{
            return redirect()->to('/user');
        }
    }

    public function editCountry(int $country_id)
    {
        $this->pageTitle = "Editar ".$this->controlador;
        $row = ModelsCountry::find($country_id);
        if($row){
            $this->nombre = $row->nombre;
            $this->name = $row->name;
            $this->nom = $row->nom;
            $this->iso2 = $row->iso2;
            $this->iso3 = $row->iso3;
            $this->phone_code = $row->phone_code;
            $this->dispatchBrowserEvent('open-modal');
        }else{
            return redirect()->to('/user');
        }
    }

    public function updateCountry()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = ModelsCountry::find($this->country_id);
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

    public function destroyCountry($id)
    {
        ModelsCountry::find($id)->delete();
    }
    
    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->nombre = '';
        $this->name = '';
        $this->nom = '';
        $this->iso2 = '';
        $this->iso3 = '';
        $this->phone_code = '';
        $this->dispatchBrowserEvent('close-modal');
    }
}
