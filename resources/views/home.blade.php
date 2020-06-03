@extends('layouts.app')

@section('content')
<div class="container m-t-20">  
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
      <div class="column is-multiline">
        {{-- <h1 class="title is-4">RECENT POSTS</h1> --}}
        <!-- @foreach($recent_posts as $recent)
          <article class="column is-12">
            <div class="box">
              <div class="column is-8">
                @foreach($categories as $category)
                @if($recent->category_id == $category->id)
                  <span class="tag is-primary">{{ $recent->category->name }}</span>
                  <p class="title is-5 is-spaced m-t-10"><a href="{{ route('show_post', $recent->slug) }}">{{ $recent->title }}</a></p>
                @endif
              @endforeach
              
              @foreach($users as $user)
                @if($recent->author_id == $user->id)
                <p class="subtitle is-7"><a href="{{ route('profile.index', $user->name) }}">{{ $user->name }}</a> <span class="dotDivider">•</span> {{ $recent->published_at->format('d F Y') }}</p>
                @endif
              @endforeach
              </div>
              
              <div class="column is-4">
                
              <img src="{{ Storage::url("{$recent->image}") }}" alt="Article Image" width="45%" height="45%">
              </div>
            </div>
          </article>
              @endforeach -->

      @foreach($recent_posts as $recent)
        <article class="media article">
          <figure class="media-left">
            <p class="image is-16by9" style="width: 256px">
              <img src="{{ Storage::url("{$recent->image}") }}">
            </p>
          </figure>
          <div class="media-content">
            <div class="content">
              @foreach($categories as $category)
                @if($recent->category_id == $category->id)
                  <span class="tag is-link is-light">{{ $recent->category->name }}</span>
                  <p class="title is-5 is-spaced m-t-10">
                    <a href="{{ route('show_post', $recent->slug) }}"><strong>{{ $recent->title }}</strong></a>

                    <br>

                    <p>{{ substr(strip_tags($recent->content),0, 80) }}{{ strlen(strip_tags($recent->content)) > 80 ? '...' : ""}}</p>
                  </p>
                @endif
              @endforeach
        
              @foreach($users as $user)
                @if($recent->author_id == $user->id)
                  <p class="subtitle is-7 author"><a href="{{ route('profile.index', $user->name) }}">{{ $user->name }}</a> <span class="dotDivider">•</span> {{ $recent->published_at->format('d F Y') }}</p>
                @endif
              @endforeach
            </div>
          </div>
        </article>
      @endforeach


      </div>

      {{-- side column --}}
      <!-- <div class="column">
        <p class="title is-4">CATEGORIES</p>
        @foreach($categories as $category)
          @foreach($posts as $post)
            <p class="m-t-5">{{ $category->name }} <span class="tag is-primary is-pulled-right">{{ count(array($post->category_id)) }}</span></p>
            @break
          @endforeach
        @endforeach
      </div> -->
    </div>
  </div> <!-- end container -->


@endsection

@section('scripts')
<script>
  $(".article").click(function() {
    $('.article').css('cursor', 'pointer'); // 'default' to revert
    var link = $(this).find("a");

    link.attr("target", "_blank");
    window.open(link.attr("href"));

    return false;
  });
  $(".author").click(function() {
    $('.author').css('cursor', 'pointer'); // 'default' to revert

    link.attr("target", "_blank");
    window.open($(this).attr("href"));

    return false;
  });
</script>
@endsection