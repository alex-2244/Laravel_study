@extends('layouts.app')


@section('content')
   <div class="card">
     <div class="card-header" style="color: #0e0c28;">
       Categories Page
     </div>
     <div class="card-body">
      <table class="table table-hover">
        <thead class="table-info" style="text-align: center;">
          <th> Category Name </th>
          <th> E-mail </th>
          <th> Mobile </th>
          <th> Editing </th>
          <th> Delete </th>
        </thead>
        <tbody>

          @if ($categories->count()> 0)
            @foreach ($categories as $category)
              <tr style="text-align: center;">
                <td> {{ $category->name }} </td>
                <td> {{ $category->email }} </td>
                <td> {{ $category->mobile }} </td>
                <td>
                  <a href="{{ route('category.edit', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-outline-primary">
                    <i class="fas fa-edit"></i> </a>
                </td>
                <td>
                  <a href="{{ route('category.delete', [ 'id' => $category->id ]) }}" class="btn btn-xs btn-outline-danger">
                    <i class="fas fa-trash"></i> </a>
                </td>

              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">  No Categories </th>
            </tr>
          @endif

        </tbody>
      </table>
     </div>
   </div>
@endsection
