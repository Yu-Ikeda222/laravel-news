<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>laraval-news</title>
</head>
<body>
    @include("parts.header")
    <hr>
    <h2><?php echo $the_post["title"]; ?></h2>	
    <p><?php echo nl2br($the_post["article"]); ?></p>

    <form method="post" action="{{ url('/addcom') }}">　　
    @csrf
    <input type="hidden" name="post_id" value="{{$the_post['title']}}">
	<div>
		<label>コメント</label><br />
		<textarea name="comment"></textarea>
	</div>
    <input type="submit" value="コメントを追加" /> 
    </form>
    <p><?php echo nl2br($comment); ?></p>
</body>
</html>