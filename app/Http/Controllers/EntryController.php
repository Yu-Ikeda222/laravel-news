<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use App\post;

class EntryController extends Controller
{
    public function show(){
        $input_data = post::all();
		return view('home',['input_data' => $input_data]);
    }

    public function entry(Request $request)
    {

        $input = $request->only('id','title','article');
        $entry = new post();
        $entry->title = $input["title"];
        $entry->article = $input["article"];
        $entry->timestamps =false;
        $entry->save();

        return redirect('/');
       
    }

    public function delete(Request $request){
        $id = $request->post_id;
        post::find($id)->delete();
        return redirect('/');


    }

}
