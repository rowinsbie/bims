<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = "refprovince";


    public function CityMunicipality() {
        return $this->hasMany(CityMunicipality::class,'regDesc','regCode');
    }


}