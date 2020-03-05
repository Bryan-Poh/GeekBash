@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New Category</h1>
      </div>
    </div>
    <hr class="m-t-0">
    <form action="{{route('manage.categories.store')}}" method="POST">
      @csrf
      <div class="columns">
        <div class="column">
          <div class="field">
            <label for="name" class="label">Category Name</label>
            <p class="control">
              <input type="text" class="input" name="name" id="name">
            </p>
          </div>
        </div> <!-- end of .column -->
      </div> <!-- end of .columns for forms -->
      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary is-pulled-right" style="width: 250px;">Create New User</button>
        </div>
      </div>
    </form>
  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password: true,
      }
    });
  </script>
@endsection