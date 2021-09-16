<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <form action="{{ url('/api/index') }}" method="GET" style="text-align: center">
        @csrf
        <input type="text" name="keyword" required>
        <input type="submit" value="検索">
    </form>
</body>
