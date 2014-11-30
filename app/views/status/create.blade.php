@extends('layouts.scaffold')

@section('main')

<h1>Add Status</h1>
{{ Form::open(array('route' => 'status.store')) }}
	<ul>
            <li>
            {{ Form::label('member_id', 'Member ID:') }}
            {{ Form::text('member_id') }}
        </li>
        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>



		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
