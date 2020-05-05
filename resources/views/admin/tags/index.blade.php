@extends('layouts.app')

@section('content')
    <div class="card">
      <div class="card-header">
        Tags
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <th>
              Tag Name
            </th>

            <th>
              Editing
            </th>

            <th>
              Deleting
            </th>
          </thead>

          <tbody>

            @if($tags->count()>0)
              @foreach($tags as $tag)
                <tr>
                  <td>{{$tag->tag}}</td>

                  <td>
                    <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-light btn-xs">
                      Edit
                    </a>
                  </td>

                  <td>
                    <a href="{{route('tag.delete', $tag->id)}}" class="btn btn-danger btn-xs">
                      Delete
                    </a>
                  </td>
                </tr>
              @endforeach

            @else
              <th colspan="5" class="text-center">No Tags to show</th>
            @endif

          </tbody>

        </table>

      </div>


    </div>
@stop
