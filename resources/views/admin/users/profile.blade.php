@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}

  <div class="card">
    <div class="card-header" style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);">
        Edit your profile
    </div>
    <div class="card-body">
    <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control">
          @if($errors->has('name'))
              <p style="color: red;"> {{ $errors->first('name') }} </p>
          @endif
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control">
          @if($errors->has('email'))
              <p style="color: red;"> {{ $errors->first('email') }} </p>
          @endif
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control">
            @if($errors->has('password'))
              <p style="color: red;"> {{ $errors->first('password') }} </p>
          @endif
        </div>
        <div class="form-group">
            <label for="avatar">Update new avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="form-group">
            <label for="facebook">Facebook Profile</label>
            <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
            @if($errors->has('facebook'))
              <p style="color: red;"> {{ $errors->first('facebook') }} </p>
          @endif
        </div>
        <div class="form-group">
            <label for="youtube">Youtube Profile</label>
            <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
            @if($errors->has('youtube'))
              <p style="color: red;"> {{ $errors->first('youtube') }} </p>
          @endif
        </div>
        <div class="form-group">
            <label for="about">About you</label>
            <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->profile->about }}</textarea>
            @if($errors->has('about'))
              <p style="color: red;"> {{ $errors->first('about') }} </p>
          @endif
        </div>
        <div class="form-group">
        <div class="text-center">
          <button class="btn btn-success" type="submit"> Update User </button>
        </div>
        </div>
      </form>
    </div>
  </div>


@endsection
