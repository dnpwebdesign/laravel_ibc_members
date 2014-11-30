@extends('layouts.scaffold')

@section('main')

<h1>Our Members</h1>

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
<th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
{{ link_to_route('users.show', $user->username,
 array($user->id), array('class' => 'link')) }}
                    </td>
          <td>{{ $user->first_name }} {{ $user->last_name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>
@if(Auth::user()->username=="admin"||Auth::user()->username==$user->username)
                    {{ link_to_route('users.edit', 'Edit',
 array($user->id), array('class' => 'btn btn-info')) }}
                    
          {{ Form::open(array('method' 
=> 'DELETE', 'route' => array('users.destroy', $user->id))) }}                       
                            {{ Form::submit('Delete', array('class'
 => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        
                    @else

                    </td>
                    @endif
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    {{ $users->links(); }}
@else
    There are no users
@endif

@stop