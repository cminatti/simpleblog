@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $post->title }}</h2>
                </div>
                <div class="panel-body">
                    <div>
                        {{ $post->body }}
                    </div>
                    <hr>
                    <div>
                        Categories: 
                        @foreach ( $post->categories as $c )
                            <a href="{{ url('category/'.$c->slug)  }}">{{ $c->name }}</a> &nbsp;
                        @endforeach
                    </div>
                    <br>
                    <div>
                        Comments:
                        <div class="panel-body">

                            @include('front.comments.show')
                            @include('front.comments.edit')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
