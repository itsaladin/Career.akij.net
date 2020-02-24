<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Employer;
use App\Models\Category;
use Image;

use App\Helpers\ImageUploadHelper;


class CategoryController extends Controller
{
    /**
     * index()
     * 
     * Return the SuperAdmin Dashboard Page 
     * 
     * @return view
     */
    public function index()
    {
        $categoriec = Category::select(
            'id', 'name', 'image', 'description', 'slug'
        )-> orderBy('id','desc')->get();

        return view('backend.pages.job-category.index', compact('categoriec'));
    }
    /**
     * 
     * create()
     * 
     * create category :: method
     *
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'id'           => 'nullable',
            'name'         => 'required|max:250',
            'image'        => 'nullable',
            'description'  => 'required|max:250',
            'parent_category_id' => 'nullable',
        ],
        [
            'name.required'        => 'Please provide a employer name',
            'description.required' => 'Please provide a valide employer description',
        ]);

        try {
            $Category = new Category();
            $Category->name = $request->name;
            $Category->slug = str_slug($request->name);
            
            $Category->parent_category_id = null;
            $Category->description = $request->description;
           
            $Category->image = ImageUploadHelper::upload('category_image', $request->file('category_image'), time(), 'public/img/categoriec');
            $Category->save();
            // dd(1);

        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            // DB::rollBack();
            // return back();
        }
        
        return back();
    }
    /**
     * 
     * edit()
     * 
     * edit Category :: method
     *
     */
    public function edit($id)
    {
        try {
            //selected id category 
            $categorybyId = Category::find($id);
            
            if (!is_null($categorybyId)){
                $categorybyId = Category::select(
                    'id', 'name', 'image', 'description', 'slug'
                )->where('id', $id)->get();

                //all categories 
                // $categoriec = Category::select(
                //     'id', 'name', 'image', 'description', 'slug'
                // )-> orderBy('id','desc')->get();
        

                return view('backend.pages.job-category.edit',compact(['categorybyId']));
            }

        } catch (\Throwable $th) {
            session()->flash('error', 'No categories has found by this ID');
            return $this->index();
        }
    }
    /**
     * 
     * update()
     * 
     * update Category :: method 
     *
     */
    public function update(Request $request, $id)
    {
        //$employer = Employer::find($id);

        $this->validate($request,[
            'id'           => 'nullable',
            'name'         => 'required|max:100',
            'image'        => 'nullable',
            'description'  => 'required|max:250',
            'parent_category_id' => 'nullable',
        ],
        [
            'name.required'        => 'Please provide a employer name',
            'description.required' => 'Please provide a valide employer description',
        ]);

         try {

            // Category Update by Category Id
            $category = new Category;
            $category = Category::find($id);
            $category->name = $request->name;

            // $Category->slug = str_slug($request->name);
            // $Category->parent_category_id = null;
            
            $category->description = $request->description;

            // If there is any image then save it
            if (isset($request->category_image)) {
                $category->image = ImageUploadHelper::update('category_image', $request->file('category_image'), time(),'public/img/categoriec/','public/img/categoriec/'.$category->image);
            }
            $category->save();

            session()->flash('success', 'Category Information has been updated successfully !!');
            return back();
        } catch (\Exception $e) {
            session()->flash('db_error', $e->getMessage());
            //DB::rollBack();
            return back();
        }
    }
    /**
     * 
     * destroy()
     * 
     * delete Category :: method 
     *
     */
    public function destroy($id)
    {
        //dd(1);
        $category = Category::find($id);
        if (!is_null($category)) {
            $category->delete();
            session()->flash('success', 'Category Information has been deleted successfully !!');
            return back();
        }

        session()->flash('error_msg', 'Sorry !! There is no Category has found !!');
        return back();
    }
}
