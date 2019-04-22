@extends('layouts.app')


@section('content')
    <div class="card">
      <div class="card-header">
        Users
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead class="table-info" style="background-color: #0052CC;color: #fff;text-align: center;">
            <th> Image </th>
            <th> Name </th>
            <th> permission </th>
            <th> Delete </th>
          </thead>
          <tbody>
            @if ($users->count() > 0)
              @foreach ($users as $user)
                <tr style="text-align: center;">
                  <td> <img src="{{ asset($user->profile->avatar) }}" alt="" width="40px" height="40px" style="border-radius: 50%;"> </td>
                  <td> {{ $user->name }} </td>
                  <td>
                      @if ($user->admin)
                          <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-primary">Remove Permission</a>
                      @else
                          <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-success"> Make admin </a>
                      @endif
                  </td>
                  <td>
                        @if (Auth::id() !== $user->id)
                            <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <th colspan="5" class="text-center">  No users </th>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
@endsection
