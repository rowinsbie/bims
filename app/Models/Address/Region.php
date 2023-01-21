<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = "refregion";

    public function Province() {
        return $this->hasMany(Province::class,'regCode','regCode');
    }

    public function CityMunicipality() {
        return $this->hasMany(CityMunicipality::class,'regDesc','regCode');
    }

   

}
