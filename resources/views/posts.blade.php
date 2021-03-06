@extends('layout')

@section('content')
@foreach ($posts as $post)
<article>
    <h1>
        <a href="/posts/{{ $post->slug}}">
            {{ $post->title }}
    </h1>

    <p>
        By <a href="/authors/{{$post->author->id}}">{{$post->author->name}} </a> in <a
            href="/categories/{{ $post->category->slug}}">{{ $post->category->name}} </a>
        </a>
    </p>
    Published <time>{{$post->created_at->diffForHumans()}}</time>
</article>

<div>
    {!! $post->body !!}
</div>
@endforeach
@endsection