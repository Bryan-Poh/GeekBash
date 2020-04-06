@extends('layouts.app')

@section('content')
<div class="container">
	<!-- Image -->
  <section class="hero ">
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-10 is-offset-1"> 
            <div class="has-text-centered m-b-20">

              @foreach($categories as $category)
                @if($post->category_id == $category->id)
                  <p class="subtitle is-6 has-text-link is-uppercase has-text-weight-semibold m-b-50"><a href="">{{ $post->category->name }}</a></p>
                @endif
              @endforeach

              <h2 class="title is-2 has-text-weight-medium">{{ $post->title }}</h2>
              @foreach($users as $user)
                @if($post->author_id == $user->id)
                <h1 class="subtitle is-6 m-t-20 has-text-grey"><a href="{{ route('profile.index', $user->name) }}">{{ $user->name }}</a> // {{ $post->published_at->format('F d Y') }}</h1>
                @endif
              @endforeach
              
            </div>
            <hr style="height: 0.25%"/>
            <figure class="image is-16by9">
              {{-- <img src="{{ asset('storage/image/'.$post->image) }}" alt=""> --}}
              {{-- <img src="{{ asset('storage/'.$post->image) }}" alt=""> --}}
              {{-- <img src="{{ asset('storage/'.$post->image) }}" alt=""> --}}
              <img src="{{ Storage::url("{$post->image}") }}" alt="Article Image">
              {{-- <img src="{{ asset('/images/default.png') }}" alt=""> --}}
            </figure>
          </div>
        </div>

        <section class="section">
          <div class="columns">
            <div class="column is-8 is-offset-2">
              <div class="content is-medium">
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