<x-layout>
    <article>
        <h2>{{ $post->title }}</h2>
        <p>{!! $post->body !!}</p>
    </article>
    <a href="/">Go Back</a>
</x-layout>