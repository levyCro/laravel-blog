   <x-layout>
   <article>
      <h1>{!! $post->title !!}</h1> 
      <div>
        {!! $post->body !!}
        <small>{{ \Carbon\Carbon::parse($post->date)->format('d/m/Y')}}</small>
      </div>
      
    </article>

    <a href="/">Go Back</a>
    </x-layout>