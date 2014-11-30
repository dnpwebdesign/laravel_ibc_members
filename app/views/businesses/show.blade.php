@extends('layouts.scaffold')

@section('main')

<h2>{{{ $business->name }}}</h2>



					<p>{{{ $business->description }}}</p>

					<br />
						<div class="form-group">
	
					<legend>Contacts</legend>
					
				<p><b>{{{ $business->name }}}</b></p>
					<p>{{{ $business->street }}} {{{ $business->suburb }}}
					{{{ $business->state }}} {{{ $business->postcode }}}
					</p>
					<p>
					<b> p: </b>{{{ $business->phone }}}</p>
					<p>
					<b> e: </b><a href="mailto:{{ $business->email }}">{{{ $business->email }}}</a></p>
					<p>
					<b> w: </b><a href="http://{{ $business->website }}">{{{ $business->website }}}</a></p>
					<p><b>ABN:</b> {{ $business->abn }}</p>
										<br>
					<legend>Social Media</legend>
					<p><b>Twitter:</b> {{{ $business->twitter }}}</p>
					<p><b>Facebook:</b> {{{ $business->facebook }}}</p>
		
</div>	
<br>
<?php $already =false; ?>

<legend>Key Employees</legend>
<table class="table table-striped table-bordered">
	<tbody>

	<tr>
		<th>Name</th>
		<th>Role</th>
		<th>Status</th>

		<th></th>

	</tr>

	@foreach($users_array as $user)
	@if (Auth::user()->username === $user["username"])
		<?php $already =true; ?>
	@endif
	<tr>
		<td>
		
{{ link_to_route('users.show', $user["username"],
 $user["id"], array('class' => 'link')) }}
		</td>
		<td>
		{{$user["role"]}}
		</td>
		<td>
		{{$user["is_owner"]}}
		</td>


				<td>
				@if ($already === true)
	{{ link_to_route('members_businesses.edit', 'Edit', $user["mb_id"], array('class' => 'btn btn-info')) }}    	
	
@endif
	</td>

		
	</tr>
@endforeach
	</tbody>
	</table>
@if ( Auth::check() === true)
	@if ($already === false)
		{{ link_to_route('members_businesses.link', 'Join ' . $business->name, array(Auth::user()->id,$business->id ), array('class' => 'btn btn-info')) }}
	@else
		You are an employee of {{$business->name}}. 
{{ link_to_route('members_businesses.unlink', 'Resign from ' . $business->name, array(Auth::user()->id,$business->id ), array('class' => 'link')) }}

	@endif
@else
	Please login.
@endif
<br><br>
<div class="form-group">
@if ($already === true)
{{ Form::open()}}
    {{ link_to_route('businesses.edit', 'Edit', $business->id, array('class' => 'btn btn-info')) }}    
{{ Form::open(array('method' => 'DELETE', 'route' => array('businesses.destroy', ''))) }}
{{ Form::submit('Remove', array('class'=> 'btn btn-danger')) }}

{{ Form::close()}}
@endif
{{ link_to_route('businesses.index', 'Back to List','', array('class' => 'btn')) }}				
</div>

@stop
