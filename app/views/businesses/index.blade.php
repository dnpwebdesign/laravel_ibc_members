@extends('layouts.scaffold')

@section('main')

<h1>All Businesses</h1>

<p>{{ link_to_route('businesses.create', 'Register a Business') }}</p>

@if ($businesses->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>

				<th>State</th>

			</tr>
		</thead>

		<tbody>
			@foreach ($businesses as $business)
				<tr>
					<td>{{ link_to_route('businesses.show', $business->name,
 array($business->id), array('class' => 'link')) }}</td>
					<td>{{{ $business->description }}}</td>

					<td>{{{ $business->state }}}</td>

                    <td>{{ link_to_route('businesses.edit', 'Edit', array($business->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('businesses.destroy', $business->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no businesses
@endif

@stop
