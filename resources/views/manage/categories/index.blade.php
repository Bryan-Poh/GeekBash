@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Categories</h1>
      </div>
      <div class="column">
        <a href="{{ route('manage.categories.create') }}" class="button is-primary is-pulled-right">Create New Category</a>
      </div>
    </div>

    <hr>

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow is-hoverable is-fullwidth">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Actions</th>
            </tr>
          </thead>
        
          <tbody>
            @foreach($categories as $category)
            <tr>
              <th>{{ $loop->iteration }}</th>
              <td>{{ $category->name }}</td>
              <td>
                  <div class="buttons">
                    <a href="{{ route('manage.categories.edit', $category->id) }}" class="button is-info">Edit</a>
                    <form method="POST" action="{{ route('manage.categories.destroy', $category->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}

                        <input onclick="return confirm('Are you sure you want to delete category: {{ $category->name }}?')" type="submit" class="button is-danger" value="Delete"></input>
                    </form>
                  </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection