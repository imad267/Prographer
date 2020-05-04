@extends('layouts.app')

@section('content')
    <div class="card">
      <div class="card-header">
        Published posts

      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <th>
              Image
            </th>

            <th>
              Title
            </th>

            <th>
              Edit
            </th>

            <th>
              Trash
            </th>
          </thead>

          <tbody>

            @if($posts->count()>0)
              @foreach($posts as $post)
                <tr>
                  <td><img src="{{$post->image}}" alt="{{$post->title}}" width="100px" height="70px" /></td>
                  <td>{{$post->title}}</td>
                  <td>
                    <a href="{{route('post.edit', $post->id)}}" class="btn btn-info">Edit</a>
                  </td>
                  <td>
                    <a href="{{route('post.delete', $post->id)}}" class="btn btn-danger">Trash</a>
                  </td>
                </tr>
              @endforeach
            @else
            <tr>
              <th colspan="5" class="text-center">No Posts to show</th>
            </tr>
            @endif

          </tbody>

        </table>

      </div>


    </div>
@stop
