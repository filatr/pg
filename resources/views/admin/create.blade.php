<!DOCTYPE html>
<html>
<head>
    <title>Create new Job position</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
</head>
<body>

<div class="container">
    @include('includes.nav')

    <h1>Create a Job Description</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open([
    'url' => 'articles',
    'method' => 'POST',
    'name' => 'search'
    ]) }}

    <div class="row">
        <div class="col-xs-4">
            {{ Form::label('name', 'Name *') }}
            {{ Form::text('name', isset($_SESSION['name']) ? $_SESSION['name'] : null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            {{ Form::label('author', 'Author *') }}
            {{ Form::text('author', isset($_SESSION['author']) ? $_SESSION['author'] : null, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            {{ Form::label('description', 'Description *') }}
            {{ Form::textarea('description', isset($_SESSION['description']) ? $_SESSION['description'] : null, array('class' => 'form-control', 'id' => 'description')) }}
        </div>
    </div>
    <div class="row" style="margin-bottom: 20px;">
        {{ Form::submit('Create the Article!', ['class' => 'btn btn-primary', 'onclick' => 'changeBack()']) }}
        {{ Form::close() }}
        {{--<a class="btn btn-small btn-success" style="float: right;" href="{{ URL::to('articles/showCreate/') }}">Preview Vacancy</a>--}}
        <button class="btn btn-primary" style="float:right;" onclick="changeAction()" >Preview</button>
    </div>

</div>
</body>
</html>
<script>
    CKEDITOR.replace('description');
    function changeAction() {
        document.search.action = "/showCreate";
        document.search.target = "_blank";
    }
    function changeBack() {
        document.search.action = "/articles";
        document.search.target = "_self";
    }
</script>