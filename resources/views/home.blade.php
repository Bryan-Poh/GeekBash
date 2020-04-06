@extends('layouts.app')

@section('content')
<div class="container m-t-20">
  <!-- <div class="tile is-ancestor">
    <div class="tile is-4 is-vertical is-parent">
      <div class="tile is-child box">
          <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure>  
      </div>
      <div class="tile is-child box">
          <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure> 
      </div>
    </div>
    <div class="tile is-parent">
      <div class="tile is-child box">
        <figure class="image">
            <a href=""><img src="../images/blank-post.png" alt=""></a>
          </figure> 
      </div>
    </div>
  </div> -->
  
  <!-- newsletter -->
  <!-- <section class="section">
    <div class="columns">
      <div class="column is-10 is-offset-1">
        <div class="container has-text-centered is-fluid">
          <div class="hero is-light">
            <div class="hero-body">
              <h2 class="title is-4">Sign up for our newsletter</h2>
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
  </section> -->

  

  <!-- Articles -->
  <div class="container">
    <!--  <div class="columns is-multiline">
      @foreach($recent_posts as $recent)
        
          <article class="column is-6">
            <div class="box">
            @foreach($categories as $category)
              @if($recent->category_id == $category->id)
                <span class="tag is-primary">{{ $recent->category->name }}</span>
                <p class="title is-5 is-spaced m-t-10"><a href="{{ route('show_post', $recent->slug) }}">{{ $recent->title }}</a></p>
              @endif
            @endforeach
            
            @foreach($users as $user)
              @if($recent->author_id == $user->id)
              <p class="subtitle is-7"><a href="#">{{ $user->name }}</a> | {{ $recent->published_at->format('d F Y') }}</p>
              @endif
            @endforeach
    
            {{-- <p class="subtitle">{{ substr(strip_tags($post->content),0, 80) }}{{ strlen(strip_tags($post->content)) > 80 ? '...' : ""}}</p> --}}
            </div>
          </article>
      @endforeach
    </div> -->

    <div class="columns">
      {{-- main column --}}
      <div class="column is-two-thirds is-multiline">
        <h1 class="title is-4">RECENT POSTS</h1>
        @foreach($recent_posts as $recent)
          <article class="column is-12">
            <div class="box">
              @foreach($categories as $category)
                @if($recent->category_id == $category->id)
                  <span class="tag is-primary">{{ $recent->category->name }}</span>
                  <p class="title is-5 is-spaced m-t-10"><a href="{{ route('show_post', $recent->slug) }}">{{ $recent->title }}</a></p>
                @endif
              @endforeach
              
              @foreach($users as $user)
                @if($recent->author_id == $user->id)
                <p class="subtitle is-7"><a href="{{ route('profile.index', $user->name) }}">{{ $user->name }}</a> | {{ $recent->published_at->format('d F Y') }}</p>
                @endif
              @endforeach
            </div>
          </article>
      @endforeach
      </div>

      {{-- side column --}}
      <div class="column">
        <p class="title is-4">CATEGORIES</p>
        @foreach($categories as $category)
          @foreach($posts as $post)
            <p class="m-t-5">{{ $category->name }} <span class="tag is-primary is-pulled-right">{{ count(array($post->category_id)) }}</span></p>
            @break
          @endforeach
        @endforeach
      </div>
    </div>
  </div> <!-- end container -->


@endsection
