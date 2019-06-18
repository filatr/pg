@extends('layouts.front')

@section('title')@stop

@section('content')
@stop

<body>
<div class="container">
    <div class="header">
        <p>Добро пожаловать на сайт компании "Рога и Копыта"</p>

        <div class="col-md-4">
            <form action="/search" method="get">
                <div class="form-group">
                    <input type="search" name="search" class="form-control">
                    <span class="form-group-btn">
            <button type="submit" class="btn btm-primary">search</button>
        </span>
                </div>
            </form>

        </div>

    </div>
    <h1>Статьи</h1>
    <div class="contet">



        @foreach($articles as $key => $value)
            <div class="description">
                <p class="like_b">Описание</p>
                <div class="first_d"><p>{{ $value->description }}</p></div>
                <div class="author">
                    <p>Автор: {{ $value->author }}</p>
                </div>
                <div class="show">
                    <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $value->id) }}" target="_blank">Посмотреть полностью</a>
                </div>
            </div>
        @endforeach

        {{ $articles->links() }}

    </div>
    <div class="footer">
        <div><a href="/admin/" target="_blank">Skill Up admin panel</a> || <a href="/articles/" target="_blank">Skill Up articles panel</a></div>
        <div><a href="https://github.com/filatr/pg" target="_blank">GitHub</a></div>
    </div>
</div>
</body>
</html>