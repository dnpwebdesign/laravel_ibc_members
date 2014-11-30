@extends('layouts.scaffold')

@section('main')



{{ Form::open(array('route' => 'businesses.store_user', 'class'=>'form-signup')) }}
<h1>Register a Business for {{$username}}</h1>
    <ul>
        <li>
            {{ Form::label('name', 'Business Name:', array('class'=>'form-label')) }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:', array('class'=>'form-label')) }}
            {{ Form::textarea('description') }}
	     {{ Form::hidden('user_id', $user_id )}}
        </li>
</ul>

<legend>Basic Contacts</legend>
<ul>
        <li>
            {{ Form::label('email', 'Email:', array('class'=>'form-label')) }}
            {{ Form::text('email') }}
        </li>
        <li>
            {{ Form::label('phone', 'Phone:', array('class'=>'form-label')) }}
            {{ Form::text('phone') }}
        </li>

        <li>
            {{ Form::label('website', 'Website:', array('class'=>'form-label')) }}
            {{ Form::text('website') }}
        </li>


</ul>

<legend>Address</legend>
<ul>

        <li>
            {{ Form::label('street', 'Street:', array('class'=>'form-label')) }}
            {{ Form::text('street') }}
        </li>

        <li>
            {{ Form::label('suburb', 'Suburb:', array('class'=>'form-label')) }}
            {{ Form::text('suburb') }}
        </li>

        <li>
            {{ Form::label('state', 'State:', array('class'=>'form-label')) }}
            {{ Form::text('state') }}
        </li>

        <li>
            {{ Form::label('postcode', 'Postcode:', array('class'=>'form-label')) }}
            {{ Form::input('number', 'postcode') }}
        </li>
</ul>
<legend>Other Info</legend>
<ul>
        <li>
            {{ Form::label('twitter', 'Twitter:', array('class'=>'form-label')) }}
            {{ Form::text('twitter') }}
        </li>

        <li>
            {{ Form::label('facebook', 'Facebook:', array('class'=>'form-label')) }}
            {{ Form::text('facebook') }}
        </li>
        <li>
            {{ Form::label('abn', 'Abn:', array('class'=>'form-label')) }}
            {{ Form::text('abn') }}
        </li>

		<li>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
			{{ Form::submit('Submit', array('class' => 'btn btn-large btn-primary')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


