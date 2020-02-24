<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Contact;

use Validator;

class ContactsController extends Controller
{
    //akij career home page
    public function index()
    {
    	return view('frontend.pages.contacts.index');
    }   

    //store contact page  contact-form message data
    // public function store(Request $request)
    // {   
    //     //dd($request);
    //     $this->validate($request,[
    //         'name'     => 'required|max:100',
    //         'email'    => 'required|email|max:100|unique:contacts,email',
    //         'subject'  => 'required|max:100',
    //         'phone'    => 'required|max:100',
    //         'message'  => 'required|max:250',

    //         // 'address_bn' => 'nullable|max:190',
    //         // 'business_description' => 'nullable|max:190',
    //     ],[
    //         'name.required' => 'Please give a name',
    //         'email.required' => 'Please give a correct email address',
    //         'subject.required' => 'Please give a subject',
    //         'message.required' => 'Message field must not be empty',
    //     ]);

    //     try {
    //         DB::beginTransaction();
    //         $contact = new Contact();
    //         $contact->name = $request->name;
    //         $contact->email = $request->email;
    //         $contact->subject = $request->subject;
    //         $contact->phone   = $request->phone;
    //         $contact->message = $request->message;
    //         $contact->save();

    //         DB::commit();
    //         session()->flash('success', 'Your message has been send successfully !!');
    //         return redirect()->back();
    //         //dd($contact);

    //     } catch (\Exception $e) {
    //         // session()->flash('db_error', 'Error On: '."File:" . $e->getFile(). "Line:" . $e->getLine(). "Message:" . $e->getMessage());
    //         session()->flash('db_error', $e->getMessage());
    //         //DB::rollBack();
    //         return back();
    //     }
    // 	return view('frontend.pages.contacts.index');
    // }
    
}
