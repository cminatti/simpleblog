<div>
{!! Form::open([ 'action' => 'CommentController@store', 'id' => 'comment-form', 'method' => 'POST']) !!}

    {!! Form::hidden('post_id', $post->id) !!}

    <div class="row form-group {{ $errors->has('name') ? 'has-error':'' }}">
        <label class="col-sm-3 control-label" for="name">Name*</label>
        <div class="col-sm-6">
            <div class="input-group">
                {!! Form::text('name', false, ['class' => 'form-control', 'id' => 'name']) !!}
            </div>
        </div>

        @if($errors->has('name'))
        {!! $errors->first('name', '<small class="control-label">:message</small>') !!}
        @endif
    </div>

    <div class="row form-group {{ $errors->has('body') ? 'has-error':'' }}">
        <label class="col-sm-3 control-label" for="body">Your Comment*</label>
        <div class="col-sm-6">
            <div class="input-group">
                {!! Form::textarea('body', false, ['class' => 'form-control', 'id'=> 'body']) !!}
            </div>
        </div>

        @if($errors->has('body'))
        {!! $errors->first('body', '<small class="control-label">:message</small>') !!}
        @endif
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="btn-toolbar">
                <button class="btn-primary btn">Submit</button>
                <button class="btn-default btn cancel">Cancel</button>
            </div>
        </div>
    </div>
    
{!! Form::close() !!}
</div>