<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Institution;
use App\Models\Employer;
use App\Models\Category;
use App\Models\Skill;

class PagesController extends Controller
{
	
	/**
	 * index()
	 * 
	 * @return view Return Home Page
	 */
    public function index()
    {
		$jobs = Job::orderBy('id', 'desc')->get();
        $institutions = Institution::orderBy('name', 'asc')->get();
		$employers = Employer::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $skills = Skill::orderBy('name', 'asc')->get();
		
        return view('frontend.pages.index', compact('jobs', 'institutions','employers', 'categories', 'skills'));    	
    }

    public function about()
    {
    	return view('frontend.pages.about');
    } 

}
