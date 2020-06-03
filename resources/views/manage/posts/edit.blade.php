@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit Post</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('manage.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    	{{method_field('PUT')}}
      @csrf
      <div class="columns">
        <div class="column is-three-quarters-desktop is-three-quarters-tablet">
          <div class="control">
          	<label class="label">Title</label>
					  <input class="input" type="text" size="is-large" name="title" value="{{ $post->title }}" />
					</div>

          <div class="file has-name is-pulled-left m-t-30">
            <div class="field-label">
              <label class="label">Blog Cover Image:</label>
            </div>
            <div id="file-js-example" class="file has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="image">
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Choose a file…
                  </span>
                </span>
                <span class="file-name" name="filename">
                  fe{{ $post->image }}
                </span>
              </label>
            </div>
          </div>

          <div class="field is-horizontal is-pulled-right m-t-30">
            <div class="field-label ">
              <label class="label">Category:</label>
            </div>
            <div class="field-body">
              <div class="field is-narrow">
                <div class="control">
                  <div class="select is-fullwidth">
                    <select name="category_id">
                      @foreach($categories as $category)
                        @if($category->id == $post->category_id)
                          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>

          <div class="control m-t-20 m-b-50">
          	<label class="label">Slug</label>
					  <input class="input" type="text" name="slug" value="{{ $post->slug }}" disabled />
					</div>
         {{--  <p class="m-t-20"><span style="color: red">*</span> Tip! Compose your post in fullscreen! <b><i>ctrl+shift+F</i></b></p> --}}
          
            
          
         <!--  <b-field class="m-t-100">
           <b-input type="textarea" rows="20" name="content" id="post-editor" value="{!! $post->content !!}">
           </b-input>
         </b-field>  -->
          <textarea type="textarea" rows="20" name="content" id="post-editor" value="{!! $post->content !!}"></textarea>
          </b-field>

        </div> <!-- end of .column.is-three-quarters -->

        <div class="column is-one-quarter-desktop is-narrow-tablet">
          <div class="card card-widget">
            <div class="author-widget widget-area">
              <div class="selected-author">
                <img src="https://placehold.it/50x50"/>
                <div class="author">
                  <h4><b>{{ Auth::user()->name }}</b></h4>
                  <!-- <p class="subtitle">
                    
                  </p> -->
                </div>
              </div>
            </div> <!-- end of widget-area -->
            <div class="post-status-widget widget-area">
              <div class="status">
                <!-- <div class="status-icon">
                  <b-icon type="fas fa-file-alt" size="is-medium"></b-icon>
                  <ion-icon name="document"></ion-icon>
                </div> -->
                <div class="status-details"> 
                  <h4><b>Published on:</b></h4>
                  <h5>{{ $post->published_at->format('F d Y, h:i') }}</h5>
                </div>
              </div>
            </div><!-- end of widget-area -->
            <div class="publish-buttons-widget widget-area">
              <div class="primary-action-button">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="button is-primary is-fullwidth">Update Post</button>
              </div>
            </div> <!-- end of widget-area -->
          </div>
        </div> <!-- end of .column.is-one-quarter -->
      </div>
    </form>

  </div> <!-- end of .flex-container -->
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
