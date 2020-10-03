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
    <h1>さあ、最新のニュースをシェアしましょう</h1>
    @include("parts.form")
    @include("parts.content")
    
</body>
</html>