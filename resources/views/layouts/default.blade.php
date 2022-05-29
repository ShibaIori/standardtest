<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="/css/reset.css">
    <style>
    .title {
      margin-top: 30px;
      text-align:center;
      font-size:25px;
    }
    .content {
      margin:30px; 
    }
    </style>

  </head>

  <body>
    <h1 class="title">@yield('title')</h1>
    <div class="content">
      @yield('content')
    </div>
  </body>

</html>