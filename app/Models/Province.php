<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    
    protected $table = 'provinces';

    protected $fillable = [
        'nombre', 'name', 'nom', 'iso2', 'iso3', 'phone_code', 'country_id'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
