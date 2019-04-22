@extends('layouts.app')


@section('content')
    <div class="card">
      <div class="card-header">
        Trashed Page
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead class="table-info" style="background-color: #0052CC;color: #fff;text-align: center;">
            <th> Image </th>
            <th> Title </th>
            <th> Edit </th>
            <th> Restore </th>
            <th> Destroy </th>
          </thead>
          <tbody>

            @if ($posts->count() > 0)
              @foreach ($posts as $post)
                <tr style="text-align: center;">
                  <td> <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px"> </td>
                  <td> {{ $post->title }} </td>
                  <td>
                    <a href="#" class="btn btn-sm btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                  </td>
                  <td>
                    <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-outline-success">
                      <i style="color: green;" class="fas fa-trash-restore"></i> </a>
                  </td>
                  <td>
                    <a href="{{ route('post.kill', ['id' => $post->id]) }}" style="color: red;" class="btn btn-sm btn-outline-danger">
                      <i class="fas fa-trash"></i> </a>
                  </td>
                </tr>
              @endforeach
            @else
                <tr>
                  <th colspan="5" class="text-center">  No Trashed posts </th>
                </tr>
            @endif

          </tbody>
        </table>
      </div>
    </div>
@endsection
