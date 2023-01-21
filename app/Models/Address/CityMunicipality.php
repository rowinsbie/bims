<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityMunicipality extends Model
{
    use HasFactory;
    protected $table = "refcitymun";

    public function Barangay() {
        return $this->hasMany(Barangay::class,'citymunCode','citymunCode');
    }

}
