<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;
    protected $table = "refbrgy";

    public function Region() {
        return $this->belongsTo(Region::class,'regCode','brgyCode');
    }
}
