@extends('layouts.scaffold')

@section('main')

<style>
.profile-img
{
//width: 296px;
height: 150px;
margin: 10px 1px 10px;
display: block;
-moz-border-radius: 10%;
-webkit-border-radius: 10%;
border-radius: 10%;
}
</style>

<h1>{{ $user->username }}</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' =>
 array('users.update', $user->id))) }}
    <ul>
        <li>
        @if($user->photo=="")
            @if($user->gender==1)
                {{HTML::image('uploads/members/male.jpg', $user->username, array('class'=>'profile-img','height'=>'100'))}}
            @else
                {{HTML::image('uploads/members/female.jpg', $user->username, array('class'=>'profile-img','height'=>'100'))}}
            @endif
        @else
            {{HTML::image('uploads/members/'.$user->photo, $user->username, array('class'=>'profile-img','height'=>'100'))}}
        @endif
        </li>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ $user->first_name }} {{ $user->last_name }}
        </li>
<li>
            {{ Form::label('name', 'Gender:') }}
            @if($user->gender==1)
                Male
            @elseif($user->gender=="")
                Unspecified
            @else
                Female
            @endif
        </li>
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ $user->email }}
        </li>
        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ $user->phone }}
        </li>
        <li>
            {{ Form::label('phone', 'Occupation:') }}
            {{ $occupation_array }}
        </li>
        <li>
            {{ Form::label('location', 'Location:') }}
            {{ $location }}
        </li>
        <li>
            {{ Form::label('bio', 'Bio:') }}
            {{ $user->bio }}
        </li>
        <li>
            {{ Form::label('password', 'Password:') }}
            {{ $show_password }}
        </li>
        <li>

    @if(Auth::user()->username=="admin"||Auth::user()->username==$user->username) 
            {{ link_to_route('users.edit', 'Edit',
 array($user->id), array('class' => 'btn btn-info')) }}
           {{ Form::open(array('method' 
=> 'DELETE', 'route' => array('users.destroy', $user->id))) }}                       
                            {{ Form::submit('Delete', array('class'
 => 'btn btn-danger')) }}
@endif
            {{ link_to_route('users.index', 'Back to List', $user->
id, array('class' => 'btn')) }}{{ Form::close() }}
        </li>

        <li>



        </li>
    </ul>


@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
    @if (count($business_array))
<h2>{{ $user->username }}'s Business Profiles</h2>

<table class="table table-striped table-bordered">
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Location</th>
     @if(Auth::user()->username==$user->username)
    <th>Action</th>
    @endif
</tr>
@foreach($business_array as $bu)
<tr><td>



 {{ link_to_route('businesses.show', $bu->name,
 array($bu->id), array('class' => 'link')) }}
</td>

<td>
 {{$bu->description}}
</td>
<td>
 {{$bu->state}}
</td>
 @if(Auth::user()->username==$user->username)
    <td>
    @if(Auth::user()->username==$user->username)
        {{ Form::open(array('method' => 'DELETE', 'route' => array('members_businesses.destroy', $bu->mb_id))) }}
        {{ Form::submit('Remove', array('class'=> 'btn btn-danger')) }}
        {{ Form::close()}}
            @endif
    </td>
@endif
</tr>
@endforeach

</table>
@endif

@if(Auth::user()->username==$user->username)
<legend>Join a Business</legend>
{{ link_to_route('businesses.list', 'Select from List',
 array($user->id), array('class' => 'btn btn-info')) }}
 {{ link_to_route('businesses.add', 'Register My Business',
 array($user->id), array('class' => 'btn btn-info')) }}
@endif
@stop

