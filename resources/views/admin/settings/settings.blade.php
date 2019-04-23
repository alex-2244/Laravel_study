@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}

  <div class="card">
    <div class="card-header" style="color: #0e0c28;">
        Edit blog settings
    </div>
    <div class="card-body">
    <form action="{{ route('settings.update') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="name">Site Name</label>
          <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Address</label>
          <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Contact Number</label>
            <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
          </div>
          <div class="form-group">
            <label for="name">Contact E-mail</label>
            <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
          </div>
        <div class="form-group">
        <div class="text-center">
          <button class="btn btn-xs btn-success" type="submit"> Updare Settings </button>
        </div>
        </div>
      </form>
    </div>
  </div>


@endsection
