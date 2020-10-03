<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function show(Request $request)
    {
        //idをつける
        $post_id = $request->id;
        //データを読み込んで改行で分ける
        $posts_data = Storage::get('data.txt');
        $posts = explode("\n", $posts_data);
        //foreachでthe_postに入れる
        $the_post = [];
        foreach ($posts as $post) {
            $post_arr = explode(',', $post);
            if ($post_arr[0] == $post_id) {
                $the_post['id'] = $post_arr[0];
                $the_post['title'] = $post_arr[0];
                $the_post['article'] = $post_arr[1];
                break;
            }
        }
        //データを一つずつ取り出す
        $comment = Storage::get('comment.txt');
        return view('comment', compact('the_post', 'comment'));
    }

    public function comment(Request $request)
    {
        //フォームで送られてきた内容をテキストファイルに書き込み
        $get = $request->comment;
        $get_id = $request->post_id;
        Storage::prepend('comment.txt', $get . "," . $get_id);
        //データを一つずつ取り出す
        $comment = Storage::get('comment.txt');
        //データを読み込んで改行で分ける
        $posts_data = Storage::get('data.txt');
        $posts = explode("\n", $posts_data);
        
        //foreachでthe_postに入れる
       //$the_post = [];
        foreach ($posts as $post) {
            $comment_arr = explode(',', $post);
            dd($comment_arr);
            if($comment_arr[1] == $get_id){
            if(empty($post)){break;}
            $post_arr = explode(',', $post);
                $the_post['title'] = $post_arr[0];
                $the_post['article'] = $post_arr[1];
               
        }
    }
    //    dd($post_arr);
    //   aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
        return view('comment', compact('the_post','comment'));
    }
}
