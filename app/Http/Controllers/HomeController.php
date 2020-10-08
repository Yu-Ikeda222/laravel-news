<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class HomeController extends Controller
{
    public function show(){
        // return view("home");
        //データを一つずつ取り出す(ここでつまずいた泣)
        $content = Storage::get('data.txt');
        $input_data = explode("\n", $content);
        return view('home',compact('input_data'));
    }

    public function entry(Request $request) {
        //データを一つずつ取り出す(番号もこれでつける)
        $content = Storage::get('data.txt');
        $input_data = explode("\n", $content);
        //フォームで送られてきた内容をテキストファイルに書き込み
        $input = $request->only('title','article');
        $data=count($input_data) . "," .  $input["title"] . "," . $input["article"];
        Storage::prepend('data.txt', $data);
           
        
            return redirect('/');
        }
}
