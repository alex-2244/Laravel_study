@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

  <div class="card">
    <div class="card-header" style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);">
        Create a new posts
    </div>
    <div class="card-body">
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="featured">Featured</label>
            <input type="file" name="featured" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit"> Store post </button>
          </div>
        </div>
      </form>
    </div>
  </div>


@endsection
