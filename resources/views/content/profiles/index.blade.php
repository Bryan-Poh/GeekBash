@extends('layouts.app')

@section('content')
<!-- <div class="container">
  <img src="{{ Storage::url("{$user->image}") }}" alt="Profile Picture" width="150px" height="150px" style="border-radius: 100%">
  <h2>{{ $user->name}}'s Profile Page</h2>

  {{-- <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="file has-name is-pulled-left">
      <div class="field-label">
        <label class="label">Update Profile Image:</label>
      </div>
      <div id="file-js-example" class="file has-name">
        <label class="file-label">
          <input class="file-input" type="file" name="avatar">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
          <span class="file-name">
            No file uploaded
          </span>
        </label>
      </div>
    </div>

    <input type="submit">
  </form> --}}
</div> -->

<div class='columns'>
  <div class='container profile'>
    <div class='section profile-heading'>
      <div class='columns is-multiline has-text-centered'>
        <div class='column is-12'>
          <span class='header-icon user-profile-image'>
            <img alt='User Profile Image' src='{{ Storage::url("{$user->image}") }}' width="180px" height="180px" style="border-radius: 100%">
          </span>
        </div>
        <div class='column is-12-tablet'>
          <p>
            <span class='title is-bold'>{{ $user->name }}</span>
          </p>
          <hr/>
        </div>
        
        @foreach($posts as $post)
        <p class="title is-4 is-bold m-t-20 m-l-10">{{ App\Post::where('author_id', Auth::user()->id)->count() }} Articles By {{ $user->name }}</p>
        @break
        @endforeach

      </div>
    </div>
    
    <div class='columns is-multiline is-mobile m-l-10 m-r-10'>

      @foreach($posts as $post)
      <div class='column is-one-third-desktop'>
        <div class='card'>
          <div class='card-image'>
            <figure class='image is-4by3'>
              {{-- <img alt='' src='http://placehold.it/300x225'> --}}
              <a href="{{ route('show_post', $post->slug) }}">
                <img alt='' src='{{ Storage::url("{$post->image}") }}'>
              </a>
            </figure>
          </div>
          <div class='card-content'>
            <div class='content'>

              @foreach($categories as $category)
                @if($post->category_id == $category->id)
                  <span class='tag is-dark subtitle'>{{ $post->category->name }}</span>
                  <p class="title is-5 is-spaced m-t-10"><a href="{{ route('show_post', $post->slug) }}">{{ $post->title }}</a></p>
                @endif
              @endforeach
              
              <p>{{ substr(strip_tags($post->content),0, 80) }}{{ strlen(strip_tags($post->content)) > 80 ? '...' : ""}}</p>
            </div>
          </div>
        </div>
        <br>
      </div>
      @endforeach
      
  </div>

</div>

@endsection

@section('scripts')
<script>
    const fileInput = document.querySelector('#file-js-example input[type=file]');
    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        const fileName = document.querySelector('#file-js-example .file-name');
        fileName.textContent = fileInput.files[0].name;
      }
    }
  </script>
@endsection