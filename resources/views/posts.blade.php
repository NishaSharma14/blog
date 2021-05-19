@extends('layout')

@section('content')
@foreach ($posts as $post)
<article>
    <h1>
        <a href="/posts/{{ $post->slug}}">
            {{ $post->title }}
    </h1>
    </a>
    <p>
        <a href="/categories/{{ $post->category->slug}}">{{ $post->category->name}} </a>
    </p>

</article>

<div>
    {!! $post->body !!}
</div>
@endforeach
@endsection