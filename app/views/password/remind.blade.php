@extends('layouts.users-')
@section('main')

 <h1>Password Remider</h1>
 

@if (Session::has('error'))
  <p style="color: red;">{{ trans(Session::get('reason')) }}</p>
@elseif (Session::has('status'))
  <p style="color: green;">An email with the password reset has been sent.</p>
@else
  Send a reminder to your email.
@endif
{{ Form::open(array('route' => 'password.remind')) }}
 
  <p>{{ Form::label('email', 'Email') }}
  {{ Form::text('email') }}</p>

  <p>{{ Form::submit('Submit') }}</p>
 
{{ Form::close() }}
@stop