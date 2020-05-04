@extends('layouts.app')

@section('content')
    <div class="card">
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
              Restore
            </th>

            <th>
              Delete
            </th>
          </thead>

          <tbody>
            @foreach($posts as $post)
              <tr>
                <td><img src="{{$post->image}}" alt="{{$post->title}}" width="100px" height="70px" /></td>
                <td>{{$post->title}}</td>
                <td>Edit</td>
                <td>
                  <a href="{{route('post.restore', $post->id)}}" class="btn btn-success btn-sm">Restore</a>
                </td>
                <td>
                  <a href="{{route('post.kill', $post->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>




            @endforeach
          </tbody>

        </table>

      </div>


    </div>
@stop
