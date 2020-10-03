<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class EntryController extends Controller
{
    public function entry(Request $request) {
    //フォームで送られてきた内容をテキストファイルに書き込み
        $input = $request->only('title','article');
        $data=$input["title"] . "," . $input["article"];
        Storage::prepend('data.txt', $data);
    //データを一つずつ取り出す
        $content = Storage::get('data.txt');
        $input_data = explode("\n", $content);
        return view('home',compact('input_data'));
    }

    // public function show(){
    //     return view("list");
    // }

}
