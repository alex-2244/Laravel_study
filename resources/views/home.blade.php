@extends('layouts.app')

@section('content')

  <div class="card">
      <div class="card-header" style="background-color: rgb(0, 82, 204);color: rgb(255, 255, 255);">
        Dashboard
      </div>

      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        Welcome!
      </div>
  </div>

@endsection
