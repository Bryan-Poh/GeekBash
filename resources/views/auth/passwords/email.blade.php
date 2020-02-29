@extends('layouts.app')

@section('content')

@if (session('status'))
  <div class="notification is-success">
    {{ session('status') }}
  </div>
@endif

<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title">Reset Your Password</h1>

        <form action="{{route('password.request')}}" method="POST" role="form">
          @csrf
          
          <div class="field">
            <label for="email" class="label">Email Address</label>
            <p class="control">
              <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" value="{{old('email')}}" required>
            </p>
            @if ($errors->has('email'))
              <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
          </div>

          <button class="button is-success is-outlined is-fullwidth m-t-30">Reset Password</button>
        </form>
      </div> <!-- end of .card-content -->
    </div> <!-- end of .card -->
  </div>
</div>

@endsection