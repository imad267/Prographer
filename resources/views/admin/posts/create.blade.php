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
      Create new post

    </div>

    <div class="card-body">
      <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
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
          <label for="category">Select a Category</label>
          <select class="form-control" name="category_id" id="category">
            @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach

          </select>

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
