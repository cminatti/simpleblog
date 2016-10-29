<div>
    <div id="comments-list">
    @foreach($post->comments as $c)
        <div class="comment">
            <strong>{{ $c->name }}</strong> says: <br>
            <p>{{ $c->body }}</p>
            <hr>
        </div>
    @endforeach
    </div>
    <div class="hidden">
    <div class="comment template">
        <strong class="name"></strong> says: <br>
        <p class="body"></p>
        <hr>
    </div>
    </div>
</div>