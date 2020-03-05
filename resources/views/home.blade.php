@extends('layouts.app')

@section('content')
<div class="container m-t-20">
  <div class="tile is-ancestor">
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

          @foreach($categories as $category)
            @if($post->category_id == $category->id)
              <p class="title is-5 is-spaced"><a href="#">{{ $post->title }}</a><span class="tag is-primary">{{ $post->category->name }}</span></p>
            @endif
          @endforeach
          
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

  <div class="tile is-ancestor">
    <div class="tile is-parent is-8 is-multiline">
      @foreach($posts as $post)
      <article class="tile is-child box">
        <p class="title">{{ $post->title }}</p>
        <p class="subtitle">With some content</p>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.</p>
        </div>
      </article>
      @endforeach
    </div>
    <div class="tile is-parent">
    <article class="tile is-child box">
      <div class="content">
        <p class="title">Tall column</p>
        <p class="subtitle">With even more content</p>
        <div class="content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam semper diam at erat pulvinar, at pulvinar felis blandit. Vestibulum volutpat tellus diam, consequat gravida libero rhoncus ut. Morbi maximus, leo sit amet vehicula eleifend, nunc dui porta orci, quis semper odio felis ut quam.</p>
          <p>Suspendisse varius ligula in molestie lacinia. Maecenas varius eget ligula a sagittis. Pellentesque interdum, nisl nec interdum maximus, augue diam porttitor lorem, et sollicitudin felis neque sit amet erat. Maecenas imperdiet felis nisi, fringilla luctus felis hendrerit sit amet. Aenean vitae gravida diam, finibus dignissim turpis. Sed eget varius ligula, at volutpat tortor.</p>
          <p>Integer sollicitudin, tortor a mattis commodo, velit urna rhoncus erat, vitae congue lectus dolor consequat libero. Donec leo ligula, maximus et pellentesque sed, gravida a metus. Cras ullamcorper a nunc ac porta. Aliquam ut aliquet lacus, quis faucibus libero. Quisque non semper leo.</p>
        </div>
      </div>
    </article>
  </div>


  </div>
</div>



@endsection
