@extends('layouts.scaffold')

@section('main')


{{ Form::open(array('route' => 'users.store', 'class'=>'form-signup')) }}
   <h1 class="form-signup-heading">Add Member</h1>
   <br>
   <ul>
      @foreach($errors->all() as $error)
         <li class="error">{{ $error }}</li>
      @endforeach
   </ul>

    <ul>

        <li>
            {{ Form::label('type_id', 'Occupation:') }}
            {{ Form::select('type_id', $type_options,array('class'=>'input-block-level', 'placeholder'=>'Type')) }}

        </li>
        <br>
        <li>
            {{ Form::text('first_name', null, array('class'=>'input-block-level', 'placeholder'=>'First Name')) }}
            
        </li>
<li>
            {{ Form::text('lastname_name', null, array('class'=>'input-block-level', 'placeholder'=>'Last Name')) }}
            
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
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
{{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary'))}}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        
    </ul>
@endif

@stop