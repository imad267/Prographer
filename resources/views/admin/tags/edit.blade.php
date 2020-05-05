@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
  <div class="card">
    <div class="card-header">
      Update Tag: {{$tag->tag}}

    </div>

    <div class="card-body">
      <form action="{{route('tag.update', $tag->id)}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label for="tag">Name</label>
          <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
        </div>
        <div class="form-group">
          <div class="text-center">
            <button type="submit" class="btn btn-dark">
              Update the tag
            </button>

          </div>

        </div>


      </form>

    </div>

  </div>
@stop
