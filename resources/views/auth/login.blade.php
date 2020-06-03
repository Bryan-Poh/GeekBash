@extends('layouts.app')

@section('content')
<div class="columns">
  <div class="column is-one-third is-offset-one-third m-t-100">
    <div class="card">
      <div class="card-content">
        <h1 class="title">Log In</h1>

        <form action="{{route('login')}}" method="POST" role="form">
          {{csrf_field()}}
          <div class="field">
            <label for="email" class="label">Email Address</label>
            <p class="control">
              <input class="input {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="name@example.com" value="{{old('email')}}">
            </p>
            @if ($errors->has('email'))
              <p class="help is-danger">{{$errors->first('email')}}</p>
            @endif
          </div>
          <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
              <input class="input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" password-reveal>
            </p>
            @if ($errors->has('password'))
              <p class="help is-danger">{{$errors->first('password')}}</p>
            @endif
          </div>

          <button class="button is-success is-outlined is-fullwidth m-t-30">Log In</button>

          <div class="is-divider" data-content="OR"></div>
          
          <div class="has-text-centered">
            <p>
              <a href="{{ route('register') }}">Register An Account</a><span class="p-l-10 p-r-10">•</span><a href="" class="is-muted">Forgot Your Password?</a>
            </p> 
          </div>

        </form>
      </div> <!-- end of .card-content -->
    </div> <!-- end of .card -->
  </div>
</div>
@endsection