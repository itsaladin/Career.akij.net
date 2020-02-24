<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Upazilla;
use App\Models\District;

class DistrictController extends Controller
{

    //get district by division -> method()
    public function getDistrict($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        $html = "";
        foreach ($districts as $district) {
            $html .= "<option value='" . $district->id . "'>" . $district->name . "</option>";
        }
        return $html;
    }
    
}