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
      Edit your profile

    </div>

    <div class="card-body">
      <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="name">Username</label>
          <input type="text" name="name" value="{{$user->name}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" value="{{$user->email}}" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">New Password</label>
          <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
          <label for="avatar">New profile picture</label>
          <input type="file" name="avatar" class="form-control">
        </div>

        <div class="form-group">
          <label for="about">About me</label><br>

          <textarea name="about" rows="8" cols="80" id="about">{{$user->profile->about}}</textarea>
        </div>

        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-dark">
              Update Profile
            </button>

          </div>

        </div>


      </form>

    </div>

  </div>
@stop
