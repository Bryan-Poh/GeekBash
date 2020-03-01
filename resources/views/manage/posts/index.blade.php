@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Posts</h1>
      </div>
      <div class="column">
        <a href="{{route('manage.posts.create')}}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Posts</a>
      </div>
    </div>
    <hr class="m-t-0">
    
    <div class="card">
      <div class="card-content">
        <table class="table is-narrow is-hoverable is-fullwidth">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Excerpt</th>
              <th>Comments</th>
              <th>Published Date</th>
              <th>Actions</th>
            </tr>
          </thead>
        
          <tbody>
            @foreach($posts as $post)
            <tr>
              <th>{{ $post->id }}</th>
              <td><a href="{{ $post->slug }}">{{ $post->title }}</a></td>
              <td>{{ $post->excerpt }}</td>
              <td>{{ $post->comment_count }}</td>
              <td>{{ $post->published_at->format('F d, Y H:i:s') }}</td>
              <td><a href="{{ route('manage.posts.edit', $post->id) }}" class="button is-outlined">Edit</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
@endsection