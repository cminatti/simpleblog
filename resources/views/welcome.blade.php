@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Latest Posts</h2>
                </div>
                <div class="panel-body">
                    @foreach ($posts as $post)
                        <a href="{{ url('post/'.$post->slug)  }}">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <div>
                            {{ $post->getExcerpt() }}
                        </div>
                        <div>
                            <a href="{{ url('post/'.$post->slug)  }}">View Entire Post</a>
                        </div>
                        <div>
                            Categories: 
                            @foreach ( $post->categories as $c )
                                <a href="{{ url('category/'.$c->slug)  }}">{{ $c->name }}</a> &nbsp;
                            @endforeach
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel-body">
                @foreach ($categories as $c)
                    <a href="{{ url('category/'.$c->slug)  }}">
                       {{$c->name}}
                    </a>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
