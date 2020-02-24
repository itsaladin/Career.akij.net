<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Hash;
use App\Models\User;

class UserController extends Controller
{

    //Job Seeker SignUp -> method()
    public function create(Request $request)
    {
        
        $rules = array(
            'fName'  => 'required|max:100',
            'lName'    => 'required|max:100',
            'userName'  => 'required|max:100',
            'email'  => 'required|email|max:100|unique:users,email',
            'gender'  => 'required',
            'password'  => 'required|min:6|max:20',
            'rePassword'  => 'required_with:password|same:password|min:6|max:20',
            // 'captureCode'   => 'required|max:20',
            // 'termsCondition'  => 'required|max:20',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $users = new User();
        $users->first_name = $request->fName;
        $users->last_name = $request->lName;

        $users->username = $request->userName;
        $users->email = $request->email;
        $users->gender = $request->gender;

        $users->password = Hash::make($request->password);

        if ($users->save()) {
            return response()->json(['success' => 'SignUp successfully.']);
        }
    }

    //Job Seeker login -> method()
    // public function userLogin(Request $request)
    // {
    //     alert("ddd");
    //     $rules = array(
    //         'Username'  => 'required|max:100',
    //         'password'  => 'required|min:6|max:20',
    //     );

    //     $error = Validator::make($request->all(), $rules);

    //     if($error->fails())
    //     {
    //         return response()->json(['errors' => $error->errors()->all()]);
    //     }

    //     $users = new User();

    //     $userName = Job::find($request->Username);
    //     $password = Job::find($request->Password);

    //     if(empty($userName) || empty($password)){
    //         return response()->json(['errors' => 'Unauthorized Login.']);
    //     }
    //     else{
    //         return response()->json(['success' => 'Login successfully.']);
    //     }

    //     // if ($users->save()) {
    //     //     return response()->json(['success' => 'SignUp successfully.']);
    //     // }

    // }

    // public function login(Request $request)
    // {
    //     // alert("ddd");
    //     //Validate the form data
    //     $request->validate([
    //         'username' 		=> 'required',
    //         'password' 		=> 'required|min:6'
    //     ]);

    //     //Attempt to log the employee in
    //     if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password, 'is_approved' => 1], $request->remember)) {
    //         //If successful then redirect to the intended location
    //         session()->flash('login_success', 'Successfully Logged In');
    //         return redirect()->intended(route('index'));
    //     }
    //     // else{
    //     //     if (Auth::guard('admin')->attempt(['email' => $request->username, 'password' => $request->password, 'is_approved' => 1], $request->remember)) {
    //     //         //If successful then redirect to the intended location
    //     //         session()->flash('login_success', 'Successfully Logged In');
    //     //         return redirect()->intended(route('admin.index'));
    //     //     }
    //         else{
    //             //If unsuccessfull, then redirect to the admin login with the data
    //             Session::flash('login_error', "Username and password combination doesn't match. Please provide correct email and password");
    //             return redirect()->back()->withInput($request->only('abouts'));
    //         }
    // }
    
}