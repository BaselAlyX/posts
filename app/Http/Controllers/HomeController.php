<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');

        return view('home');
    }
    public function contact()
    {
        return view('contact-us');
    }
    public function sendMessage(Request $request){
        //dd($request->all());
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,

        ];
        Mail::to("yousof@eraasoft.com")->send(new ContactMail($data));

    }
}
