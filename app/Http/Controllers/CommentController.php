<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\post;


class CommentController extends Controller
{
    public function show($id)
    {
        $input_data = post::find($id);
        // dd($input_data);
        $input_comment = comment::where('post_id', $id)->get();
        // dd($input_comment);
        return view('comment',['input_data' => $input_data,'input_comment' => $input_comment]);
         
    }

    public function comment(Request $request)
    {
        $input_comment = $request->only('post_id', 'comment');
        $entry_comment = new comment();
        $entry_comment->comment = $input_comment["comment"];
        $entry_comment->post_id = $input_comment["post_id"];
        $entry_comment->timestamps =false;
        $entry_comment->save();
        return redirect(route('comment',$entry_comment->post_id));
    }

     public function delete(Request $request) {
         $comment_id = $request->comment_id;
         $id = $request->post_id;
         //dd($comment_id);
         comment::find($comment_id)->delete();
         return redirect(route('comment',['id'=>$id]));
     } 
}
