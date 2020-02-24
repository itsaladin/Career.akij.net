<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Auth;
use  App\Http\Controllers\Controller;
use App\Models\DegreeLevel;
use App\Models\Degree;
use Image;

use App\Helpers\ImageUploadHelper;

class DegreeController extends Controller
{
    /**
     * index()
     * 
     * Return the Degree Levels Page 
     * 
     * @return view
     */
    public function index()
    {
        $degreelevel = DegreeLevel::select(
            'id', 'name'
        )-> orderBy('id','desc')->get();

        return view('backend.pages.job-category.degree_levels', compact('degreelevel'));
    }
     /**
     * create()
     * 
     * Add new degree level :: method
     * 
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'name'   => 'required|regex:/([A-Za-z])+( [A-Za-z]+)/|max:150|unique:degree_levels'

        ],
        [
            'name.required' => 'Please provide a Degree Level name',
        ]);

        try {
            $degreelevel = new DegreeLevel();
            $degreelevel->name = $request->name;
            
            $degreelevel->save();

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            // DB::rollBack();
            return back();
        }
        
        return back();
    }
    
    //Degree level Controller start
    // public function degreeindex()
    // {
    //     $degrees = DegreeLevel::select(
    //         'id', 'name'
    //     )-> orderBy('id','desc')->get();

    //     return view('backend.pages.job-category.degrees', compact('degrees'));
    // }

    /**
     * dgree_level_edit()
     * 
     * edit degree level :: method
     * 
     * 
     */
    public function dgree_level_edit()
    {
        $degreesLbl = DegreeLevel::select(
            'id', 'name'
        )-> orderBy('id','asc')->get();
        $degrees = Degree::select(
            'id', 'name'
        )-> orderBy('id','desc')->get();

        return view('backend.pages.job-category.degree_levels', compact('degreesLbl','degrees'));
    }
    /**
     * 
     * degree_level_destroy()
     * 
     * destroy degree level :: method
     * 
     */
    public function degree_level_destroy($id)
    {
        $DegreeLevel = DegreeLevel::find($id);
        if(!is_null($DegreeLevel)){
            $DegreeLevel->delete();
        }
        Session()->flash('success','degreelevel has deleted Successfully !!');
        return back();
        // return view('admin.pages.product.edit')->with('product',$product);
    }
    /**
     * 
     * degree_level_update()
     * 
     * update degree level :: method
     * 
     */
    public function degree_level_update(Request $request, $id)
    {
        $this->validate($request,[
            'id'   => 'nullable',
            'name' => 'required|regex:/([A-Za-z])+( [A-Za-z]+)/|string|max:100'
        ],
        [
            'name.required'        => 'Please provide a Degree name',
        ]);
            
        //dd($lblid->id);
        try {
            $DegreeLevel  = new DegreeLevel();
            $DegreeLevel = DegreeLevel::find($id);
            $DegreeLevel->name = $request->name;
            $DegreeLevel->save();

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            // DB::rollBack();
            return back();
        }
        
        return back();
    }
    /**
     * 
     * degree_index()
     * 
     * degree_index page :: method
     * 
     */
    public function degree_index()
    {
        $degreesLbl = DegreeLevel::select(
            'id', 'name'
        )-> orderBy('id','asc')->get();
        $degrees = Degree::select(
            'id', 'name'
        )-> orderBy('id','desc')->get();

        return view('backend.pages.job-category.degrees', compact('degreesLbl','degrees'));
    }
    /**
     * 
     * degree_create()
     * 
     * degree_create page :: method
     * 
     */
    public function degree_create(Request $request)
    {
        $this->validate($request,[
            'id'     => 'nullable',
            'name'   => 'required|regex:/([A-Za-z])+( [A-Za-z]+)/|max:100|unique:degrees'
        ],
        [
            'name.required' => 'Please provide a Degree name',
        ]);

        try {
            $Degrees  = new Degree();
            $Degrees->name = $request->name;
            $Degrees->degree_level_id = $request->input('lblid');;
            $Degrees->save();

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            // DB::rollBack();
            return back();
        }
        return back();
    }
    /**
     * 
     * degree_destroy()
     * 
     * degree_destroy page :: method
     * 
     */
    public function degree_destroy($id)
    {
        $Degree = Degree::find($id);
        if(!is_null($Degree)){
            $Degree->delete();
        }
        Session()->flash('success','Degree has deleted Successfully !!');
        return back();
        // return view('admin.pages.product.edit')->with('product',$product);
    }
    /**
     * 
     * degree_update()
     * 
     * degree_update page :: method
     * 
     */
    public function degree_update(Request $request, $id)
    {
        $this->validate($request,[
            'id'           => 'nullable',
            'name'         => 'required|regex:/([A-Za-z])+( [A-Za-z]+)/|string|max:100'
        ],
        [
            'name.required' => 'Please provide a Degree name',
        ]);
            
        //dd($lblid->id);
        try {
            $Degrees  = new Degree();
            $Degrees = Degree::find($id);
            $Degrees->name = $request->name;
            $Degrees->degree_level_id = $request->post('lblid');;
            
            $Degrees->save();

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            // DB::rollBack();
            return back();
        }
        
        return back();
    }
}
