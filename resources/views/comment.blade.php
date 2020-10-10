<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
    <title>laraval-news</title>
</head>

<body>
    @include("parts.header")
    <hr>
    <h3>{{$input_data->title}}</h3>
    <p>{{$input_data->article}}</p>

    <form method="post" action="{{ url('/addcom') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{$input_data->id}}">
        <div>
            <label>コメント</label><br />
            <textarea name="comment"></textarea>
        </div>
        <input type="submit" value="コメントを追加" />
    </form>
        @foreach ($input_comment as $comment)
        <hr>
        @if(empty($comment))
        @break
        @endif
        <h3 class="comment">{{$comment->comment}}</h3>
        <form method="post" action="{{ url('/delete')}}">
        @csrf
            <input type="hidden" name="comment_id" value="{{$comment->id}}">
            <input type="hidden" name="post_id" value="{{$input_data->id}}">
            <input name="delete" type="submit" value="コメントを消す">

        </form>
        @endforeach
</body>

</html>