<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function show(){
        // return view("home");
        //データを一つずつ取り出す(ここでつまずいた泣)
        $content = Storage::get('data.txt');
        $input_data = explode("\n", $content);
        return view('home',compact('input_data'));
    }
}
