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
    <?php $news_arr = explode("," , $news);?>
    <h3><?php echo $news_arr[1]; ?></h3>
    <p><?php echo $news_arr[2];?><p>
	<a href="{{route('comment', ['id' => $news_arr[0]]) }}">記事全文・コメントを見る</a><br>
    @endforeach
</body>
</html>