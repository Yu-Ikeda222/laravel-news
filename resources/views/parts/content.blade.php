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
    <h2><?php echo $news_arr[0];
    echo $news_arr[1];?></h2>	
	<?php echo "<a href='http://ec2-13-230-193-221.ap-northeast-1.compute.amazonaws.com/comment?id=" . $news_arr[0] . "' >" . "記事全文・コメントを見る". "</a><br>\n"; ?>
    @endforeach
</body>
</html>