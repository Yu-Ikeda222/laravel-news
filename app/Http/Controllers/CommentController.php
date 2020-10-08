<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function show(Request $request)
    {
        //投稿内容の取得
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
                $the_post['title'] = $post_arr[1];
                $the_post['article'] = $post_arr[2];
                break;
            }
        }
        //コメントの取得
        $comment = Storage::get('comment.txt');
        $comments = explode("\n", $comment);
        $the_comment = [];
        foreach ($comments as $comment) {
            $comment_arr = explode(',', $comment);
            if($comment_arr[0] === $the_post['id']) {
            array_push($the_comment,$comment_arr);
        }
    }
        return view('comment', compact('the_post', 'the_comment'));
    }

    public function comment(Request $request)
    {
        //フォームで送られてきた内容をテキストファイルに書き込み
        $get = $request->comment;
        $get_id = $request->post_id;
        Storage::prepend('comment.txt', $get_id . "," . $get ."," . uniqid());
        return redirect()->route('comment', ['id' => $get_id]);
    }

    public function delete(Request $request) {
        $post_id = $request->post_id;
        $comment_id = $request->comment_id;
        $content  = Storage::get('comment.txt');
        $comments = explode("\n", $content);
        // dd($comments);
        foreach($comments as $comment){
            $the_comment = explode(',' , $comment);
            if($the_comment[2] == $comment_id){
                unset($the_comment[0]);
                unset($the_comment[1]);
                unset($the_comment[2]);
                $deleteComments = implode(",", $the_comment);
                Storage::put('comment.txt', $deleteComments);
                break;
            }
        }
        return redirect()->route('comment', ['id' => $post_id]);
    }
}