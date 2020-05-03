@extends('layouts.app')

@section('content')
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <th>
              Category Name
            </th>

            <th>
              Editing
            </th>

            <th>
              Deleting
            </th>
          </thead>

          <tbody>
            @foreach($categories as $category)
              <tr>
                <td>{{$category->name}}</td>
                <td>
                  <a href="{{ route('category.edit', $category->id) }}" class="btn btn-light btn-xs">
                    Edit
                  </a>
                </td>

                <td>
                  <a href="{{route('category.delete', $category->id)}}" class="btn btn-danger btn-xs">
                    Delete
                  </a>
                </td>


              </tr>

            @endforeach
          </tbody>

        </table>

      </div>


    </div>
@stop
