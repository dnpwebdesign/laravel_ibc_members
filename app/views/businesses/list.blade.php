@extends('layouts.scaffold')

@section('main')

<h1>Select a Business to join</h1>



@if (count($businesses))
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Description</th>

				<th>State</th>

			</tr>
		</thead>

		<tbody>
			@foreach ($businesses as $business)
				<tr>
					<td>{{$business->id}}</td>
					<td>{{ link_to_route('businesses.show', $business->name,
 array($business->id), array('class' => 'link')) }}</td>
					<td>{{{ $business->description }}}</td>

					<td>{{{ $business->state }}}</td>

                    <td>{{ link_to_route('members_businesses.link', 'Join', array(Auth::user()->id,$business->id ), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no businesses
@endif
<a href="{{ URL::previous() }}" class="btn btn-default">Back</a>
@stop
