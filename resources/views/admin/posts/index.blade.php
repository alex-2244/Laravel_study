@extends('layouts.app')


@section('content')
    <div class="card">
      <div class="card-header" style="color: #0e0c28;">
        Published Posts
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead class="table-info" style="text-align: center;">
            <th> Image </th>
            <th> Title </th>
            <th> Edit </th>
            <th> Trash </th>
          </thead>
          <tbody>
            @if ($posts->count() > 0)
              @foreach ($posts as $post)
                <tr style="text-align: center;">
                  <td> <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="40px" height="40px"> </td>
                  <td> {{ $post->title }} </td>
                  <td>
                    <a href="{{ route('post.edit', ['id'=> $post->id]) }}" class="btn btn-xs btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                  </td>
                  <td>
                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-outline-danger"> <i class="fas fa-trash"></i> </a>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <th colspan="5" class="text-center">  No Published Posts </th>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
@endsection
