<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Upazilla;

class UpazillaController extends Controller
{

    //get upazilla by district -> method()
    public function getUpazilla($district_id)
    {
        $upazilas = Upazilla::where('district_id', $district_id)->get();
        $html = "";
        foreach ($upazilas as $upazila) {
            $html .= "<option value='" . $upazila->id . "'>" . $upazila->name . "</option>";
        }
        return $html;
    }
    
}