@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}

  <div class="card">
    <div class="card-header" style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);">
        Edit Tag : {{ $tag->tag }}
    </div>
    <div class="card-body">
    <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Tag</label>
            <input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
            {{-- @if($errors->has('tag'))
                <p style="color: red;"> {{ $errors->first('tag') }} </p>
            @endif --}}
        </div>
          <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="submit"> Update Tags </button>
          </div>
        </div>
      </form>
    </div>
  </div>


@endsection
