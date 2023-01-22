<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address\Region;
use App\Models\Address\Province;
use App\Models\Address\CityMunicipality;
use App\Models\Address\Barangay;
use App\Models\ResidentAddress;


class PHAddressAPIController extends Controller
{
    public function getRegionList() {
        return Region::all();
    }

    public function getProvince(Request $request) {
         return Province::where('regCode',$request['id'])->get();
    }

    public function getCityOrMunicipality(Request $request) {
        return CityMunicipality::where('provCode',$request['id'])->get();
    }

    public function getBarangay(Request $request) {
        return Barangay::where('citymunCode',$request['id'])->get();
    }
}
