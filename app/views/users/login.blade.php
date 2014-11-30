@extends('layouts.login')

@section('main')




{{ Form::open(array('url'=>'login', 'class'=>'form-signin')) }}

<h1>IBC Members Area</h1>

<p>{{ link_to_route('register', 'Register') }}</p>
   <h2 class="form-signin-heading">Please Login</h2>
 
   {{ Form::text('email', Input::old('email'), array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
   {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
 
   {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
      @foreach($errors->all() as $error)
         <li class="error">{{ $error }}</li>
      @endforeach
{{ Form::close() }}

@stop