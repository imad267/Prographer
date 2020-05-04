@extends('layouts.app')

@section('content')
    <div class="card">
      <div class="card-header">
        Categories
      </div>
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

            @if($categories->count()>0)
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

            @else
              <th colspan="5" class="text-center">No categories to show</th>
            @endif

          </tbody>

        </table>

      </div>


    </div>
@stop
