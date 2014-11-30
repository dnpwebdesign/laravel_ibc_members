@extends('layouts.scaffold')

@section('main')

<h1>All Status</h1>

<p>{{ link_to_route('status.create', 'Add new status') }}</p>
<p>{{ link_to_route('status.dashboard', 'View Dashboard') }}</p>

@if ($statuss->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Member ID</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($statuss as $db)
				<tr>
					<td>{{{ $db->member_id }}}</td>
					<td>{{{ $db->status }}}</td>
					<td>{{{ $db->created_at }}}</td>
                    <td>{{ link_to_route('status.edit', 'Edit', array($db->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('status.destroy', $db->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no types
@endif

@stop
