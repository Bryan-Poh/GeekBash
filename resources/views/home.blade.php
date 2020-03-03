@extends('layouts.app')

@section('content')
<div class="container m-t-20">
  <div class="tile is-ancestor">
    <div class="tile is-4 is-vertical is-parent">
      <div class="tile is-child box">
        <p class="title">One</p>
          <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure>  
      </div>
      <div class="tile is-child box">
        <p class="title">Two</p>
          <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure> 
      </div>
    </div>
    <div class="tile is-parent">
      <div class="tile is-child box">
        <p class="title">Three</p>
        <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure> 
      </div>
    </div>
  </div>
    
  
  <!-- newsletter -->
  <section class="section">
    <div class="columns">
      <div class="column is-10 is-offset-1">
        <div class="container has-text-centered is-fluid">
          <div class="hero is-light">
            <div class="hero-body">
              <h2 class="title is-4">Sign up for our newsletter</h1>
                <div class="column is-6 is-offset-3">
                  <div class="field has-addons has-addons-centered">
                    <div class="control is-expanded">
                      <input class="input " type="text" placeholder="Email address">
                    </div>
                    <div class="control">
                      <a class="button is-info">
                        Subscribe
                      </a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Articles -->
  <div class="contiainer">
    <h1 class="title">Recent Posts</h1>
    <div class="tile is-ancestor">
      @foreach($posts as $post)
      <div class="tile is-parent">
        <article class="tile is-child box">
          <p class="title is-5 is-spaced"><a href="{{ route('content.posts.show', $post->id) }}">{{ $post->title }}</a></p>
          
          @foreach($users as $user)
            @if($post->author_id == $user->id)
            <p class="subtitle is-7"><a href="">{{ $user->name }}</a> | {{ $post->published_at->format('d F Y') }}</p>
            @endif
          @endforeach

          <p class="subtitle">{{ substr(strip_tags($post->content),0, 80) }}{{ strlen(strip_tags($post->content)) > 80 ? '...' : ""}}</p>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</div>



@endsection
