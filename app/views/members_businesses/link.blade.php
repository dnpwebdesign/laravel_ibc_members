@extends('layouts.scaffold')

@section('main')


{{ Form::open(array('route' => 'members_businesses.linked', 'class'=>'form-signup')) }}
 <h1>Joining a Business</h1>
    <ul>
{{ Form::hidden('member_id', $user->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        {{ Form::hidden('business_id', $business->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        <li>
       
Hi <b>{{$user->username}}</b>,
<br>
<p>
You are about to register your self as an employee of <b>{{$business->name}}</b>.
   </p>         
        </li>

        <li>
        What would be your main role in this business?
{{ Form::text('role', null, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
            
        </li>
        <li>
Are you the owner? 
            {{Form::checkbox('is_owner', '1');}} YES
        </li>
<br>
   

        <li>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
{{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary'))}}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop