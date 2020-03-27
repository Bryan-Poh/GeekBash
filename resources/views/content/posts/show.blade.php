@extends('layouts.app')

@section('content')
<div class="container">
	<!-- Image -->
  <section class="hero ">
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-8 is-offset-2">
            <figure class="image is-16by9">
              {{-- <img src="{{ asset('storage/image/'.$post->image) }}" alt=""> --}}
              {{-- <img src="{{ asset('storage/'.$post->image) }}" alt=""> --}}
              {{-- <img src="{{ asset('storage/'.$post->image) }}" alt=""> --}}
              <img src="{{ Storage::url("{$post->image}") }}" alt="">
              {{-- <img src="{{ asset('/images/default.png') }}" alt=""> --}}

            </figure>
          </div>
        </div>

        <section class="section">
          <div class="columns">
            <div class="column is-8 is-offset-2">
              <div class="content is-medium">
                <h2 class="subtitle is-4">{{ $post->title }}</h2>
                @foreach($users as $user)
                  @if($post->author_id == $user->id)
                  <h1 class="title"><a href="">{{ $user->name }}</a> | {{ $post->published_at->format('d F Y') }}</h1>
                  @endif
                @endforeach
                <p>{!! $post->content !!}</p>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </section>
</div>
@endsection