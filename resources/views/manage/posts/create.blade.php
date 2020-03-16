@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10 m-b-0">
      <div class="column">
        <h1 class="title is-4">Add New Blog Post</h1>
      </div>
    </div>
    <hr class="m-t-0">

    <form method="POST" action="{{route('manage.posts.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="columns">
        <div class="column is-three-quarters-desktop is-three-quarters-tablet">
          <b-field>
            <b-input type="text" placeholder="Title Of Post" size="is-large" v-model="title" name="title">
            </b-input>
          </b-field>

          <slug-widget url="{{url('/')}}" subdirectory="blog" :title="title" @slug-changed="updateSlug" @copied="slugCopied"></slug-widget>
          <input type="hidden" v-model="slug" name="slug" />

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
                <span class="file-name">
                  No file uploaded
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
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>
          {{-- <p class="m-t-20 is-pulled-right"><span style="color: red">*</span> Tip! Compose your post in fullscreen! <b><i>ctrl+shift+F</i></b></p> --}}
          <b-field class="m-t-100">
            <b-input type="textarea" placeholder="Compose your post here..." rows="20" name="content" id="post-editor">
            </b-input>
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
                  <h4><span class="status-emphasis">Draft</span> Saved</h4>
                  <p>A Few Minutes Ago</p>
                </div>
              </div>
            </div><!-- end of widget-area -->
            <div class="publish-buttons-widget widget-area">
              <div class="primary-action-button">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="button is-primary is-fullwidth">Publish</button>
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
    var app = new Vue({
      el: '#app',
      data: {
        title: '',
        slug: '',
        api_token: '{{Auth::user()->api_token}}'
      },
      methods: {
        updateSlug: function(val) {
          this.slug = val;
        },
        slugCopied: function(type, msg, val) {
          notifications.toast(msg, {type: `is-${type}`});
        }
      }
    });
  </script>

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