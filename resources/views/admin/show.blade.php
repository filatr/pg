<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$article->name}}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}"/>
    <!-- Bootstrap -->
    {{--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/mainpage-style.css')}}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" type="application/javascript"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="application/javascript"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="header">
        <p>Добро пожаловать на сайт компании <a href="/">'Рога и Копыта'</a></p>
    </div>
    <div class="contet">

        <div class="author">
            <p>Автор: {{$article->author}}</p>
        </div>
        <p class="like_b">Описание</p>
        <div class="first_d"><p>{!! $article->description!!}</p></div>
        <div class="time">
            <p><span>Дата создания:</span> {!! $article->created_at!!}. <span>Отредактировано:</span> {!! $article->updated_at!!}</p>
        </div>



        </div>


    <div class="footer">
        <div><a href="/admin/" target="_blank">Skill Up admin panel</a> || <a href="/articles/" target="_blank">Skill Up articles panel</a> || <a href="/search/" target="_blank">search</a> </div>
        <div><a href="https://github.com/filatr/pg" target="_blank">GitHub</a></div>
    </div>
</div>

</body>
</html>