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
              Trash
            </th>
          </thead>

          <tbody>
            @foreach($posts as $post)
              <tr>
                <td><img src="{{$post->image}}" alt="{{$post->title}}" width="100px" height="70px" /></td>
                <td>{{$post->title}}</td>
                <td>Edit</td>
                <td>
                  <a href="{{route('post.delete', $post->id)}}" class="btn btn-danger">Trash</a>
                </td>
              </tr>




            @endforeach
          </tbody>

        </table>

      </div>


    </div>
@stop
