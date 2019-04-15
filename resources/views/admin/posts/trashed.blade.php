@extends('layouts.app')


@section('content')
    <table class="table table-hover">
      <thead class="table-info" style="background-color: #0052CC;color: #fff;text-align: center;">
        <th> Image </th>
        <th> Title </th>
        <th> Edit </th>
        <th> Restore </th>
        <th> Destroy </th>
      </thead>
      <tbody>
        
        @foreach ($posts as $post)
            <tr style="text-align: center;">
              <td> <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px"> </td>
              <td> {{ $post->title }} </td>
              <td>
                <a href="#"> <i class="fas fa-edit"></i> </a>
              </td>
              <td>
                <a href="{{ route('post.trashed', ['id' => $post->id]) }}"> <i style="color: green;" class="fas fa-trash-restore"></i> </a>
              </td>
              <td>
                <a href="{{ route('post.delete', ['id' => $post->id]) }}" style="color: red;"> <i class="fas fa-trash"></i> </a>
              </td>
            </tr>
        @endforeach

      </tbody>
    </table>
@endsection