@extends('layouts.scaffold')

@section('main')


{{ Form::open(array('route' => 'members_businesses.unlinked', 'class'=>'form-signup')) }}
 <h1>Quiting a Business</h1>
 
    <ul>
    {{ Form::hidden('id', $id )}}
{{ Form::hidden('member_id', $user->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        {{ Form::hidden('business_id', $business->id, array('class'=>'input-block-level', 'placeholder'=>'E.g. Marketing Director')) }}
        <li>
       
Hi <b>{{$user->username}}</b>,
<br>
<br>
<p>
You are about to resign as an employee of <b>{{$business->name}}</b>.
   </p>         
   <p>
Are you sure?
   </p>
        </li>

        <li>
{{ Form::submit('Confirm', array('class'=>'btn btn-info'))}}
{{ Form::button('Cancel', array('class'=>'btn'))}}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop