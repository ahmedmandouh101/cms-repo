<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageControlle extends Controller
{
    public function index(){
        $title = "welcom its a title";
        return view('pages.index',['tit'=>$title]);
    }

    public function about(){
        return view('pages.about');
    }

    public function features(){
        $name= array(
            'firstname'=>'ahmed',
            'lastname'=>'mandouh',
            'address'=>'123shibin'
        );
        return view('pages.features',['array'=>$name]);
    }
}
