@extends('layouts.app')

@section('content')
<div class="container">
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