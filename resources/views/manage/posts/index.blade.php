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
              <th>#</th>
              <th>Title</th>
              <th>Excerpt</th>
              <th>Comments</th>
              <th>Status</th>
              <th>Category</th>
              <th>Published Date</th>
              <th>Actions</th>
          </tr>
          </thead>
        
          <tbody>
            @foreach($posts as $post)
              @if($post->author_id == Auth::user()->id)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td><a href="{{ route('show_post', $post->slug) }}">{{ $post->title }}</a></td>
                <!-- <td>{{ strip_tags($post->content) }}</td> -->
                <td>{{ substr(strip_tags($post->content),0, 80) }}{{ strlen(strip_tags($post->content)) > 80 ? '...' : ""}}</td>
                <td>{{ $post->comment_count }}</td>

                @if($post->status == 1) 
                  <td><span class="tag is-success">Published</span></td>
                @elseif($post->status == 2)
                  <td><span class="tag is-info">Unpublished</span></td>
                @endif
                
                @foreach($categories as $category)
                  @if($post->category_id == $category->id)
                    <td><span class="tag is-light">{{ $category->name }}</span></td>
                  @endif
                @endforeach

                <td>{{ $post->published_at->format('F d, Y H:i') }}</td>
                <td>
                	<div class="buttons">
	                	<a href="{{ route('manage.posts.edit', $post->id) }}" class="button is-info">Edit</a>
	                	<form method="POST" action="{{ route('manage.posts.destroy', $post->id) }}">
								        @csrf
								        {{ method_field('DELETE') }}

								        <input onclick="return confirm('Are you sure you want to delete post: {{ $post->title }}?')" type="submit" class="button is-danger" value="Delete"></input>
								    </form>
							  	</div>
              	</td>
              </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
@endsection