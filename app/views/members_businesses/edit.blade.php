@extends('layouts.scaffold')

@section('main')

{{ Form::model($r, array('method' => 'PATCH', 'route' => array('members_businesses.update', $r->id), 'class'=>'form-signup')) }}
{{ Form::open(array('route' => 'members_businesses.update', 'class'=>'form-signup')) }}
 <h1>Edit Employee Status</h1>
 <br>
    <ul>
{{ Form::hidden('member_id', $user->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        {{ Form::hidden('business_id', $business->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        <li>
        <li>
            {{ Form::label('username', 'Member Name:', array('class'=>'form-label')) }}
            {{ $user->username}}
        </li>       
        <li>
            {{ Form::label('business_name', 'Business:', array('class'=>'form-label')) }}
            {{$business->name}}
   
        </li>

        <li>
        {{ Form::label('role', 'Role:', array('class'=>'form-label')) }}
{{ Form::text('role', null, array('class'=>'input', 'placeholder'=>'E.g. Marketing Director')) }}
            
        </li>
        <li>
            {{ Form::label('is_owner', 'Owner?', array('class'=>'form-label')) }}
            {{Form::hidden('is_owner',0);}}
            {{Form::checkbox('is_owner',1);}} YES
            
        </li>

        <li>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
            {{ Form::submit('Update', array('class'=>'btn btn-large btn-primary'))}}
        </li>
    </ul>


{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop