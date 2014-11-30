@extends('layouts.login')

@section('main')


{{ Form::open(array('route' => 'register', 'class'=>'form-signup')) }}
   <h1 class="form-signup-heading">Become IBC Member</h1>
   <br>
   <ul>
      @foreach($errors->all() as $error)
         <li class="error">{{ $error }}</li>
      @endforeach
   </ul>

    <ul>

        <li>
            {{ Form::label('type_id', 'You are a:') }}
            {{ Form::select('type_id', $type_options,array('class'=>'input-block-level', 'placeholder'=>'Type')) }}

        </li>
        <br>
        <li>
            {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'Name')) }}
            
        </li>

        <li>
            {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email')) }}
            
        </li>

        <li>
            {{ Form::text('phone', null, array('class'=>'input-block-level', 'placeholder'=>'Mobile')) }}
            
        </li>
        <li>
            {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
            
        </li>

        <li>   {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
            
            
        </li>

        <li>
            
            {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Confirm Password')) }}
        </li>        

        <li>
        

        {{ Form::submit('Register', array('class'=>'btn btn-primary'))}}
        </li>
    </ul>

{{ Form::close() }}

@if ($errors->any())
    <ul>
        
    </ul>
@endif

@stop