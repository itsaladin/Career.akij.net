<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Upazilla;
use App\Models\District;

class DegreeController extends Controller
{
    public function getDegree($level_id)
    {
        $degrees = Degree::where('degree_level_id', $level_id)->get();
        $html = "";
        foreach ($degrees as $degree) {
            $html .= "<option value='" . $degree->id . "'>" . $degree->name . "</option>";
        }
        return $html;
    }

    
}