<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel-news</title>
</head>
<body>
<form method="post" action="{{ url('/') }}">　　
    @csrf
	<div>
		<label>タイトル</label><br />
		<input type="text" name="title" value="" placeholder="" />
	</div>

	<div>
		<label>記事</label><br />
		<textarea name="article" cols="50" rows="10"></textarea>
	</div>

	<input type="submit" value="投稿" /> 
</form>
</body>
</html>


