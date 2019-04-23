@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);" --}}

  <div class="card">
    <div class="card-header" style="color: #0e0c28;">
        Create a new category
    </div>
    <div class="card-body">
    <form action="{{ route('category.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
            @if($errors->has('name'))
                <p style="color: red;"> {{ $errors->first('name') }} </p>
            @endif
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" name="email" class="form-control">
          @if($errors->has('email'))
                <p style="color: red;"> {{ $errors->first('email') }} </p>
            @endif
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" class="form-control">
          @if($errors->has('mobile'))
                <p style="color: red;"> {{ $errors->first('mobile') }} </p>
            @endif
        </div>
          <div class="form-group">
          <div class="text-center">
            <button class="btn btn-xs btn-success" type="submit"> Store category </button>
          </div>
        </div>
      </form>
    </div>
  </div>


@endsection
