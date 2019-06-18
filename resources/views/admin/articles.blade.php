@extends('layouts.header')

@section('title')@stop

@section('content')
@stop

<body>
<div class="container">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        @include('includes.nav')
        {{--@include('includes.addLink')--}}
        <tr>
            <td colspan="9" align="center">
                <a href="{{ URL::to('articles/create') }}" class="btn btn-small btn-success">Add Job</a>
            </td>
        </tr>
        <tr>
            <td>ID</br>
                <a href="{{action('Admin\ArticleController@index', ['sort' => 'id', 'order' => 'asc'])}}">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="{{action('Admin\ArticleController@index', array('sort' => 'id', 'order' => 'desc'))}}">
                    <i class="fa fa-chevron-down"></i>
                </a></td>
            <td>Name</td>
            <td>Author</td>
            {{--<td><a href="{{ $request->fullUrlWithQuery(['sort' => 'posted']) }}">Posted</a>--}}
            <td>Description</td>
            <td>Date of creation</br>
                <a href="{{action('Admin\ArticleController@index', ['sort' => 'created_at', 'order' => 'asc'])}}">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="{{action('Admin\ArticleController@index', array('sort' => 'created_at', 'order' => 'desc'))}}">
                    <i class="fa fa-chevron-down"></i>
                </a>
            </td>
            <td>Last update</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->author }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->updated_at }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td style="min-width: 186px;">

                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                {{ Form::open(array('url' => 'articles/' . $value->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}


                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('articles/' . $value->id) }}" target="_blank">Show</a>

                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('articles/edit/' . $value->id ) }}" target="_blank">Edit</a>
                </td>
            </tr>
        @endforeach
         </tbody>
    </table>
    {{ $articles->links() }}
    {{--{{$articles->render()}}--}}

</div>
</body>
</html>