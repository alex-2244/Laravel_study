@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}

  <div class="card">
    <div class="card-header" style="color: #0e0c28;">
        Create New User
    </div>
    <div class="card-body">
    <form action="{{ route('user.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">User</label>
          <input type="text" name="name" class="form-control">
          @if($errors->has('name'))
              <p style="color: red;"> {{ $errors->first('name') }} </p>
          @endif
        </div>
        <div class="form-group">
          <label for="name">E-mail</label>
          <input type="email" name="email" class="form-control">
          @if($errors->has('email'))
              <p style="color: red;"> {{ $errors->first('email') }} </p>
          @endif
        </div>
        <div class="form-group">
        <div class="text-center">
          <button class="btn btn-xs btn-success" type="submit"> Add User </button>
        </div>
        </div>
      </form>
    </div>
  </div>


@endsection
