@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Categories</h2>
                </div>
                <div class="panel-body">
                    @foreach ($categories as $c)
                        <a href="{{ url('category/'.$c->slug)  }}">
                            <h3>{{$c->name}}</h3>
                        </a>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
