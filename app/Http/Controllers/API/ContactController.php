<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    // public function store(Request $request)
    // {
    //     // CorsHelper::addCors();

    //     try {
    //         if (empty($request->name)) {
    //             return json_encode(['status' => false, 'message' => ' Name is required !']);
    //         }
    //         if (empty($request->email)) {
    //             return json_encode(['status' => false, 'message' => 'Please input valide Email !']);
    //         }
    //         if (empty($request->subject)) {
    //             return json_encode(['status' => false, 'message' => 'Subject is required!']);
    //         }
    //         if (empty($request->phone)) {
    //             return json_encode(['status' => false, 'message' => 'Phone Number is required!']);
    //         }
    //         if (empty($request->message)) {
    //             return json_encode(['status' => false, 'message' => 'Enter uour message !']);
    //         }

    //         // $contact = Contact::where('api_token', $request->api_token)->first();
    //         $message = Contact::create([
    //             'name'  => $request->name,
    //             'email' => $request->email,
    //             'subject' => $request->subject,
    //             'phone'   => $request->phone,
    //             'message' => $request->message,
    //             'created_at' => Carbon::now(),
    //             'updated_at' => Carbon::now(),
    //         ]);

    //         return json_encode(['status' => true, 'message' => 'Message send successfully !!']);
    //         //return redirect()->back(); 
    //         // return view('contacts', compact('json_ende'));
    //     } catch (\Exception $e) {
    //         return json_encode(['status' => false, 'message' => 'Error: ' . $e->getMessage(), 'order' => null]);
    //     }
    //     // return json_encode(['status' => false, 'message' => 'Sorry !! Invalid User !!', 'order' => null]);
    // }

    public function store(Request $request)
    {
        
        $rules = array(
            'name'     => 'required|max:100',
            'email'    => 'required|email|max:100|unique:contacts,email',
            'subject'  => 'required|max:100',
            'phone'    => 'required|max:100',
            'message'  => 'required|max:250',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        // $image = $request->file('image');
        // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('images'), $new_name);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone   = $request->phone;
        $contact->message = $request->message;
        if ($contact->save()) {
            return response()->json(['success' => 'Message send successfully.']);
        }

        // return response()->json(['success' => 'Message send successfully.']);
    }
    
}