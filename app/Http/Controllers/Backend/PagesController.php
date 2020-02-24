<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    /**
     * index()
     * 
     * Return the SuperAdmin Dashboard Page 
     * 
     * @return view
     */
    public function index()
    {
        return view('backend.pages.index');
    }
}
