@extends('layouts.scaffold')

@section('main')

<h1>Show status</h1>

<p>{{ link_to_route('status.index', 'Return to all statuss') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			
				<th>Member ID</th>
				<th>Status</th>
				<th>Notes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $status->member_id }}}</td>
			<td>{{{ $status->status }}}</td>
					
					
           	<td>{{ link_to_route('status.edit', 'Edit', array($status->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('status.destroy', $status->id))) }}
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
