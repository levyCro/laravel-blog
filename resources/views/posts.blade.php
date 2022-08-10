   <x-layout>
   @foreach($posts as $post)
    <article>

        <h1>
            <a href="/posts/{{ $post->id; }}">
                {!! $post->title !!}
            </a>
        </h1>
        <div>
            <p>{{ $post->excerpt; }}</p>
            <small>{{ \Carbon\Carbon::parse($post->date)->format('d/m/Y')}}</small>
        </div>
    </article>
    @endforeach
    </x-layout>