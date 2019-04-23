@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}
  {{-- CARD STARTS --}}
  <div class="card">
    <div class="card-header" style="color: #0e0c28;">
        Create a new posts
    </div>
    <div class="card-body">
      {{-- FORM STARTS --}}
      <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control">
            @if($errors->has('title'))
              <p style="color: red;"> {{ $errors->first('title') }} </p>
            @endif
        </div>

        <div class="form-group">
            <label for="featured"> Featured </label>
            <input type="file" name="featured" class="form-control">
            @if($errors->has('featured'))
                <p style="color: red;"> {{ $errors->first('featured') }} </p>
            @endif
        </div>

        <div class="form-group">
            <label for="Select_category"> Select category </label>
            <select name="category_id" class="form-control" id="category">
              @foreach ($categories as $category)
                {{-- <option default>None</option> --}}
                <option value="{{ $category->id }}"> {{ $category->name }} </option>
              @endforeach
            </select>
            @if($errors->has('category_id'))
                <p style="color: red;"> {{ $errors->first('category_id') }} </p>
            @endif
        </div>
        <div class="form-group">
          <label for="option"> Select Tag </label>
          @foreach ($tags as $tag)
            <div class="checkbox">
              <label for="tags">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
            <label for="content"> Content </label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
            @if($errors->has('content'))
                <p style="color: red;"> {{ $errors->first('content') }} </p>
            @endif
        </div>

        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-xs btn-success" type="submit"> Store post </button>
          </div>
        </div>

      </form>
      {{-- END FORM --}}
    </div>
  </div>{{-- END CARD --}}


@endsection

@section('styles')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <!-- include summernote scripts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection
