@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

  <div class="card">
    <div class="card-header" style="background-color: #0052CC;color: #fff;">
        Update category: {{ $category->name }}
    </div>
    <div class="card-body">
      <form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
          <input type="text" name="name" value="{{ $category->name }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" name="email" value="{{ $category->email }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile</label>
          <input type="text" name="mobile" value="{{ $category->mobile }}" class="form-control">
        </div>
          <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit"> Update category </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  


@endsection
