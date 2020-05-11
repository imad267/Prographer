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
      Edit post: {{$post->title}}

    </div>

    <div class="card-body">
      <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" value="{{$post->title}}">
        </div>

        <div class="form-group">
          <label for="category">Select a Category</label>
          <select class="form-control" name="category_id" id="category">
            @foreach ($categories as $category)
              <option value="{{$category->id}}"
                @if($post->category_id == $category->id)
                selected


                @endif

                >{{$category->name}}</option>

            @endforeach

          </select>

        </div>

        <div class="form-group">
          <label for="tags">Select Tags</label>
          @foreach($tags as $tag)

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]"
              @foreach($post->tags as $t)
                @if($tag->id == $t->id)
                  checked


                @endif


              @endforeach >
              <label class="form-check-label">
                {{$tag->tag}}
              </label>
            </div>

          @endforeach


        </div>

        <div class="form-group">
          <label for="content">discription</label>
          <textarea name="content" id="content" rows="5" cols="5" class="form-control">{{$post->content}}</textarea>
        </div>

        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-dark">Update post</button>

          </div>
        </div>


      </form>

    </div>

  </div>
@stop
