@extends('layouts.app')


@section('content')
    <div class="card">
      <div class="card-header">
        Published Posts
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead class="table-info" style="background-color: #0052CC;color: #fff;text-align: center;">
            <th> Image </th>
            <th> Title </th>
            <th> Edit </th>
            <th> Trash </th>
          </thead>
          <tbody>
            @if ($posts->count() > 0)
              @foreach ($posts as $post)
                <tr style="text-align: center;">
                  <td> <img src="{{ "$post->featured" }}" alt="{{ $post->title }}" width="40px" height="40px"> </td>
                  <td> {{ $post->title }} </td>
                  <td>
                    <a href="{{ route('post.edit', ['id'=> $post->id]) }}"> <i class="fas fa-edit"></i> </a>
                  </td>
                  <td>
                    <a href="{{ route('post.delete', ['id' => $post->id]) }}"> <i class="fas fa-trash"></i> </a>
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