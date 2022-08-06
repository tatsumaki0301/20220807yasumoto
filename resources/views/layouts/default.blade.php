<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/reset.css" />
    <style>
    body{
      background-color: blue;
    }
    </style>
</head>
<body>
  <div class="content">
  @yield('content')
  </div>
</body>
</html>