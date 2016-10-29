@extends('layouts.admin')

@section('content')

@if ($post->id)
{!! Form::open(['action' => ['Admin\PostController@update', $post->id], 'class' => 'form-horizontal', 'method' => 'put']) !!}
@else 
{!! Form::open(['action' => 'Admin\PostController@store', 'class' => 'form-horizontal', 'method' => 'POST']) !!}
@endif

    {!! Form::hidden('post_id', $post->id) !!}

    <div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
        <label class="col-sm-3 control-label">Title*</label>
        <div class="col-sm-6">
            <div class="input-group">
                {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
            </div>
        </div>

        @if($errors->has('title'))
        {!! $errors->first('title', '<small class="control-label">:message</small>') !!}
        @endif
    </div>

    <div class="form-group {{ $errors->has('body') ? 'has-error':'' }}">
        <label class="col-sm-3 control-label">Post Content*</label>
        <div class="col-sm-6">
            <div class="input-group">
                {!! Form::textarea('body', $post->body, ['class' => 'form-control']) !!}
            </div>
        </div>

        @if($errors->has('body'))
        {!! $errors->first('body', '<small class="control-label">:message</small>') !!}
        @endif
    </div>
    
    <div class="form-group {{ $errors->has('categories') ? 'has-error':'' }}">
        <label class="col-sm-3 control-label">Categories</label>
        <div class="col-sm-6">
            <div class="input-group">
                {!! Form::select('categories[]', $categories,  $post->categories()->pluck('id')->toArray(), array('multiple' => true)); !!}
            </div>
        </div>

        @if($errors->has('categories'))
        {!! $errors->first('categories', '<small class="control-label">:message</small>') !!}
        @endif
    </div>
    
    
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="btn-toolbar">
                <button class="btn-primary btn">Submit</button>
                <a href="{{ url('admin') }}" class="btn-default btn">Cancel</a>
            </div>
        </div>
    </div>

    
{!! Form::close() !!}

@endsection
