@extends('layouts.app')

@section('content')
    <div class="card">
      <div class="card-header">
        Users

      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <th>
              Image
            </th>

            <th>
              Name
            </th>

            <th>
              Permissions
            </th>

            <th>
              Delete
            </th>
          </thead>

          <tbody>

            @if($users->count()>0)
              @foreach($users as $user)
                <tr>
                  <td><img src="{{asset($user->profile->avatar)}}" width="60px" height="60px" /></td>
                  <td>{{$user->name}}</td>
                  <td>
                    @if($user->admin)

                      <a href="{{route('user.not.admin',$user->id)}}" class="btn btn-sm btn-outline-info">Remove Permission</a>
                    @else

                      <a href="{{route('user.admin',$user->id)}}" class="btn btn-sm btn-outline-primary">Make admin</a>

                    @endif
                  </td>
                  <td>
                    Delete
                  </td>
                </tr>
              @endforeach
            @else
            <tr>
              <th colspan="5" class="text-center">No Users</th>
            </tr>
            @endif

          </tbody>

        </table>

      </div>


    </div>
@stop
