@extends('layouts.scaffold')

@section('main')
<style>
form { padding-top: 25px; }

.profile-img
{
width: 60px;
height: 60px;

margin: 1px 5px 5px;
//display: block;
-moz-border-radius: 10%;
-webkit-border-radius: 10%;
border-radius: 10%;
}

#status{
//padding:10px;
display:block;	
}

.status{

width:500px;

}
#right {

  //width: 100%;
  //height: 60px;
  padding:4px;
  display:block;	
  
}
#left {
  float: left;
  width: 12%;
}

#share{
	//float:right;
	margin-left:437px;
}
</style>

{{ Form::open(array('route' => 'status.store')) }}
	<ul>
            <li>
            
            {{ Form::hidden('member_id',Auth::user()->id) }}
        </li>
        <li>
            {{ Form::label('status', 'You are are saying:') }}
            {{ Form::textarea('status', null,['class'=>'status','size'=> '100x2']) }}
        </li>



		<li>
			{{ Form::submit('Shout', array('id'=>'share','class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

<h1>Shouts</h1>


@if (count($t))

	@foreach ($t as $db)
	<div id="status">
		<div id="left">
        @if($db->photo=="")
            @if($db->gender==1)
                {{HTML::image('uploads/members/male.jpg', $db->username, array('class'=>'profile-img','height'=>'50'))}}
            @else
                {{HTML::image('uploads/members/female.jpg', $db->username, array('class'=>'profile-img','height'=>'50'))}}
            @endif
        @else
            {{HTML::image('uploads/members/'.$db->photo, $db->username, array('class'=>'profile-img','height'=>'50'))}}
        @endif

        </div>
        <div id="right">
        @if($db->username=="")
        	<b>Unknown Member</b>
        @else
		<b>{{ link_to_route('users.show', $db->username,
 		array($db->member_id), array('class' => 'link')) }}</b>
 		@endif
        
		@if(Helpers::nicetime($db->when)!="Bad date")
        	{{ Helpers::nicetime($db->when)}}
        @endif
        <br> 
		{{{ $db->status }}} 
		</div>
		<hr>
		</div>
				
	@endforeach

@else
	There are no status
@endif

@stop
