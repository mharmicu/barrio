<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    public function index(){


        return view('user.home');

 
    }



    public function contactForm(Request $request){


        $data = new contactForm;

        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->message = $request->message;

        $data->save();

       return redirect()->back()->with('success', 'Query Sent Successfully.');

    }



}
