<!DOCTYPE html>
<html>
<head>
    <title>Edit Articles</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</head>
<body>
<div class="container">
    @include('includes.nav')

    <h1>Edit {{ $article->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open([
    'url' => 'articles/update/'. $article->id,
    'method' => 'PUT',
    'name' => 'search'
    ]) }}

    <div class="row">
        <div class="col-xs-4">
            {{ Form::label('name', 'Name *') }}
            {{ Form::text('name', old('name', isset($article->name) ? $article->name : null), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            {{ Form::label('author', 'Author *') }}
            {{ Form::text('author', old('author', isset($article->author) ? $article->author : null), array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {{ Form::label('description', 'Description *') }}
            {{ Form::textarea('description', old('description', isset($article->description) ? $article->description : null), array('class' => 'form-control ckeditor', 'id' => 'description')) }}
        </div>
    </div>
    <div class="row">
        {{ Form::submit('Edit the Article!', array('class' => 'btn btn-primary' , 'onclick' => 'changeBack()')) }}
        {{ Form::close() }}
        <button class="btn btn-primary" style="float:right;" onclick="changeAction()" >Preview</button>
    </div>
    </br>
</div>
</body>
</html>]
<script>
    CKEDITOR.replace('description');
    function changeAction() {
        document.search.action = "/showEdit";
        document.search.target = "_blank";
    }
    function changeBack() {
        document.search.action = "/articles/update/<?= $article->id?>";
        document.search.target = "_self";
    }
</script>