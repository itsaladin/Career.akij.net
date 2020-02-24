<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{
    public function index()
    {
    	return view('frontend.pages.trainings.index');
    }
}
