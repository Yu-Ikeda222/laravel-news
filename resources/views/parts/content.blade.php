<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>laraval-news</title>
</head>

<body>
    @foreach ($input_data as $news)
    <hr>
    @if(empty($news))
    @break
    @endif
    <h3>{{$news->title}}</h3>
    <p>{{$news->article}}</p>
    <a href="{{route('comment',$news->id)}}">記事全文・コメントを見る</a>
    <form method="post" action="{{url('/deletepost')}}">
        @csrf
        <input type="hidden" name="post_id" value="{{$news->id}}">
        <input name="delete" type="submit" value="コメントを消す">

    </form>
    @endforeach
</body>

</html>