@extends('layouts.admin')

@section('content')
<style>

.arc text {
  font: 10px sans-serif;
  text-anchor: middle;
}

.arc path {
  stroke: #fff;
}

</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                
                <div class="panel-body" id="d3chart">
                    
                </div>
                
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{$post->title}}</tc>
                            <td>
                                {{$post->getExcerpt()}}
                            </td>
                            <td>
                                
                                <a href="{{ route('posts.show', array('id' => $post->id)) }}" class="btn btn-default btn-sm">View</a>
                                <a href="{{ action('Admin\PostController@edit', array('id' => $post->id)) }}" class="btn btn-default btn-sm">Edit</a>
                                <a href="{{ action('Admin\PostController@destroy', array('id' => $post->id)) }}" class="btn btn-default btn-sm">Delete</a>
                                
                            </td>
                        <tr>
                    @endforeach
                    </tbody>
                    </table>
                    <a href="{{ route('posts.create') }}" class="btn btn-default btn-sm">New Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
