<html>

<body>
    <h3>Comment received</h3>
    <p>
        The user {{$user->name}} has posted a comment on your post <a href="{{route('posts.show', [ 'post' => $post ])}}">{{$post->title}}</a>.
    </p>
    <blockquote>{{$comment->body}}</blockquote>
</body>

</html>