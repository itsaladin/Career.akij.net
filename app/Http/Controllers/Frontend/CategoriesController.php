<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Category;

class CategoriesController extends Controller
{
     /**
	 * index() 
	 * 
	 * Categories Jobs show 
	 */
    public function index(Request $request, $id)
    {
        $jobs = new Job;
        // $jobs = Job::find($category_id);

        $jobs = Job::where('category_id', $request->id)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        //dd($jobs);
		
        return view('frontend.pages.jobs.index', compact('jobs', 'categories'));    	
    }
     /**
	 * show() 
	 * 
	 * Categories single Jobs show 
	 */
    public function show(Request $request, $id)
    {
        $jobs = new Job;
        // $jobs = Job::find($category_id);

        $jobs = Job::where('category_id', $request->id)->get();
        $categories = Category::orderBy('name', 'asc')->get();

        //dd($jobs);
		
        return view('frontend.pages.jobs.index', compact('jobs', 'categories'));    	
    }

}
