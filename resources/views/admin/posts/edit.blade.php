@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}
  {{-- CARD STARTS --}}
  <div class="card">
    <div class="card-header" style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);">
       Edit post : {{ $posts->title }} 
    </div>
    <div class="card-body">
      {{-- FORM STARTS --}}
      <form action="{{ route('post.update', ['id' => $posts->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
            <label for="title"> Title </label>
            <input type="text" name="title" class="form-control" value="{{ $posts->title }}">
            @if($errors->has('title'))
              <p style="color: red;"> {{ $errors->first('title') }} </p>
            @endif
        </div>

        <div class="form-group">
            <label for="featured"> Featured </label>
            <input type="file" name="featured" class="form-control">
            {{--  @if($errors->has('featured'))
                <p style="color: red;"> {{ $errors->first('featured') }} </p>
            @endif  --}}
        </div>

        <div class="form-group">
            <label for="Select_category"> Select category </label>
            <select name="category_id" class="form-control" id="category">
              @foreach ($categories as $category)
                {{-- <option default>None</option> --}}
                <option value="{{ $category->id }}" 

                  @if ($posts->category->id == $category->id)
                    selected
                  @endif

                  > {{ $category->name }} </option>
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
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                
                @foreach ($posts->tags as $t)

                  @if ($tag->id == $t->id)
                      checked
                  @endif
                    
                @endforeach

                > {{ $tag->tag }} </label>
            </div>
          @endforeach
        </div>

        <div class="form-group">
            <label for="content"> Content </label>
            <textarea name="content" id="content" cols="5" rows="5" class="form-control"> {{ $posts->content   }} </textarea>
            @if($errors->has('content'))
                <p style="color: red;"> {{ $errors->first('content') }} </p>
            @endif
        </div>

        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit"> Update Post </button>
          </div>
        </div>

      </form>
      {{-- END FORM --}}
    </div>
  </div>{{-- END CARD --}}


@endsection
