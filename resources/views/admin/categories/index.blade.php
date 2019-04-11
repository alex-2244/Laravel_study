@extends('layouts.app')


@section('content')
    <table class="table table-hover">
      <thead class="table-info" style="background-color: #0052CC;color: #fff;">
        <th> Category Name </th>
        <th> E-mail </th>
        <th> Mobile </th>
        <th> Editing </th>
        <th> Delete </th>
      </thead>
      <tbody>
        
        @foreach ($categories as $category)
            <tr>
              <td> {{ $category->name }} </td>
              <td> {{ $category->email }} </td>
              <td> {{ $category->mobile }} </td>
              <td>
                <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}"> <i class="fas fa-edit"></i> </a>
              </td>
              <td>
                <a href="{{ route('category.delete', [ 'id' => $category->id ]) }}"> <i class="fas fa-trash"></i> </a>
              </td>
              
            </tr>
        @endforeach

      </tbody>
    </table>
@endsection