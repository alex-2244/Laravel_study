@extends('layouts.app')


@section('content')
   <div class="card">
     <div class="card-header" style="color: #0e0c28;">
       Tags
     </div>
     <div class="card-body">
      <table class="table table-hover">
        <thead class="table-info" style="text-align: center;">
          <th> Tag Name </th>
          <th> Editing </th>
          <th> Delete </th>
        </thead>
        <tbody>

          @if ($tags->count()> 0)
            @foreach ($tags as $tag)
              <tr style="text-align: center;">
                <td> {{ $tag->tag }} </td>
                <td>
                  <a href="{{ route('tag.edit', [ 'id' => $tag->id ]) }}" class="btn btn-xs btn-outline-primary"> <i class="fas fa-edit"></i> </a>
                </td>
                <td>
                  <a href="{{ route('tag.delete', [ 'id' => $tag->id ]) }}" class="btn btn-xs btn-outline-danger"><i class="fas fa-trash"></i> </a>
                </td>

              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">  No Tags </th>
            </tr>
          @endif

        </tbody>
      </table>
     </div>
   </div>
@endsection
