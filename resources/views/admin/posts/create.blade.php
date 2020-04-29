@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">
      Create new post

    </div>

    <div class="card-body">
      <form action="{{route('post.store')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
          <label for="image_url">Image</label>
          <input type="file" name="image_url" class="form-control">
        </div>

        <div class="form-group">
          <label for="content">discription</label>
          <textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-dark">Post</button>

          </div>
        </div>


      </form>

    </div>

  </div>
@stop
