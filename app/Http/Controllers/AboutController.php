<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about() {
        $title="learn laravel ";
        $name="Basel";
        return view('about',['my_title'=>$title],['name'=>$name]);
    }
}
