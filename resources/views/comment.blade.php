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
    <h3><?php echo $the_post["title"]; ?></h3>	
    <p><?php echo nl2br($the_post["article"]); ?></p>
    <!-- フォーム -->
    
    <form method="post" action="{{ url('/comment') }}">　　
    @csrf
    <input type="hidden" name="post_id" value="{{$the_post['id']}}">
	<div>
		<label>コメント</label><br />
		<textarea name="comment"></textarea>
	</div>
    <input type="submit" value="コメントを追加" /> 
    </form>
    @foreach ($the_comment as $comment)
    @if(empty($comment))
    @break
    @endif
    <div class = "comment">
    <h4 class = "comment_text"> {{$comment[1]}}</h4>
    <form method="post" action="{{ url('/delete') }}">
    @csrf
    <input type="hidden" name="post_id" value="{{$the_post['id']}}">
    <input type="hidden" name="comment_id" value="{{$comment[2]}}">
    <input type="submit" class="comment_button" name="submit" value="コメントを消す">
    </form>
    </div>
    @endforeach
</body>
</html>