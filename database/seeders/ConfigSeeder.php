<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = json_decode(file_get_contents(public_path('jsons/countrys.json'), true));
        foreach($path as $item){
            $country = Country::create([
                'nombre' => $item->nombre,
                'name' => $item->name,
                'nom' => $item->nom,
                'iso2' => $item->iso2,
                'iso3' => $item->iso3,
                'phone_code' => $item->phone_code,
            ]);

            switch($country->nombre) {
                case "Venezuela":
                    $path = json_decode(file_get_contents(public_path('jsons/ve.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
                case "Brasil":
                    $path = json_decode(file_get_contents(public_path('jsons/br.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
                case "Argentina":
                    $path = json_decode(file_get_contents(public_path('jsons/arg.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
                case "Uruguay":
                    $path = json_decode(file_get_contents(public_path('jsons/uru.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
                case "México":
                    $path = json_decode(file_get_contents(public_path('jsons/mx.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
                case "Colombia":
                    $path = json_decode(file_get_contents(public_path('jsons/col.json'), true));
                    foreach($path as $item){
                        Province::create([
                            'nombre' => $item->subdivision_name,
                            'name' => $item->subdivision,
                            'iso2' => $item->code,
                            'iso3' => $item->Local,
                            'country_id' => $country->id
                        ]);
                    }
                    break;
            }
            
        }
    }
}
