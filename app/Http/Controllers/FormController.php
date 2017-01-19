<?php

namespace App\Http\Controllers;

use DB;
use App\Contact;
use Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forms.form');
    }
    
    public function contacts(Request $request)
    {
        $formValues = $request->all();
        //dd($formValues);
        
       $validator = Validator::make($request->all(), [
        'name' => 'required|min:8|max:255',
        'email' => 'required|unique:contacts|max:255',
        'subject' => 'required',
    ]);
        
        if ($validator->fails()) {
            //echo "Fail";exit;
		return json_encode([
            'errors' => $validator->errors()->getMessages(),
            'code' => 422
         ]);
            //return redirect('contact')
              //          ->withErrors($validator)
                //        ->withInput();
        } else {
        
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
        $contact->save();
        echo "Success";exit;
        //$request->session()->flash('message', 'Contact was submitted successful!');
        //return redirect('contactslist');
        }
    }
    
    public function contactsList(Request $request)
    {
        $contacts = DB::table('contacts')->paginate(1);
        if ($request->ajax()) {
            return view('forms.contactsajaxlist')->with(compact('contacts')); 
        }

        
        return view('forms.contactslist')->with(compact('contacts'));
    }
    
    public function emailUnique(Request $request)
    {
        $email = $_GET['email'];
        $contacts = DB::table('contacts')->where('email', $email)->count();
        if($contacts){
            echo 'false';
            exit; 
        }
        else{
            echo 'true';
            exit;
        }
        
    }
    
    public function contactsAjaxList(Request $request)
    {
        
        //$contacts = Contact::all();
        $contacts = DB::table('contacts')->paginate(1);        
        return view('forms.contactsajaxlist')->with(compact('contacts'));
    }
    
    public function contactsView($id)
    {
       
        $contacts = DB::table('contacts')->where('id', $id)->first();
        //dd($contacts);
        return view('forms.contactsview')->with(compact('contacts'));
    }
}
