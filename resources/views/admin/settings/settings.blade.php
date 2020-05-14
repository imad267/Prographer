@extends('layouts.app')

@section('content')
  @if(count($errors) > 0)
    <ul class="list-group">
      @foreach ($errors->all() as $error)
        <li class="list-group-item text-danger">
          {{$error}}
        </li>

      @endforeach

    </ul>
  @endif
  <div class="card">
    <div class="card-header">
      Edit site's settings

    </div>

    <div class="card-body">
      <form action="{{route('settings.update')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="site_name">Site name</label>
          <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
        </div>

        <div class="form-group">
          <label for="contact_info">contact</label>
          <input type="email" name="contact_info" class="form-control" value="{{$settings->contact_info}}">
        </div>

        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-dark">
              Update site settings
            </button>

          </div>

        </div>


      </form>

    </div>

  </div>
@stop
