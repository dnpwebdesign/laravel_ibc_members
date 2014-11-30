@extends('layouts.scaffold')

<style>
.profile-img
{
width: 196px;
//height: 96px;
margin: -10px 110px 10px;
display: block;
-moz-border-radius: 10%;
-webkit-border-radius: 10%;
border-radius: 10%;
}
</style>

@section('main')
{{ Form::model($user, array('files' => true,'method' => 'PATCH', 'route' =>
 array('users.update', $user->id))) }}
 <h1>Edit Member's profile</h1>
    <ul>

       
        <br>
        <li>
        {{ Form::label('first_name', 'First Name:', array('class'=>'form-label')) }}
            {{ Form::text('first_name', null, array('class'=>'', 'placeholder'=>'First Name')) }}
            
        </li>
                <li>
        {{ Form::label('last_name', 'Last Name:', array('class'=>'form-label')) }}
            {{ Form::text('last_name', null, array('class'=>'', 'placeholder'=>'Last Name')) }}
            
        </li>
                <li>
        {{ Form::label('gender', 'Gender:', array('class'=>'form-label')) }}
            {{ Form::radio('gender', '1') }} Male
            {{ Form::radio('gender', '0') }} Female
            
        </li>
        <li>
        {{ Form::label('email', 'Email:', array('class'=>'form-label')) }}
            {{ Form::text('email', null, array('class'=>'', 'placeholder'=>'Email')) }}
            
        </li>

        <li>
        {{ Form::label('mobile', 'Mobile:', array('class'=>'form-label')) }}
            {{ Form::text('phone', null, array('class'=>'', 'placeholder'=>'Mobile')) }}
            
        </li>
        <li>
            {{ Form::label('type_id', 'Occupation:', array('class'=>'form-label')) }}
            {{ Form::select('type_id', $type_options,array($user->type_id,'class'=>'', 'placeholder'=>'Type')) }}

        </li>
                <li>
        {{ Form::label('location_code', 'Location (Nearest Capital City):', array('class'=>'form-label')) }}
        {{ Form::select('location_code', $location_options,array($user->location_code,'class'=>'', 'placeholder'=>'Location')) }}

        </li>
                <li>
            {{ Form::label('bio', 'Bio:', array('class'=>'form-label')) }}
            {{ Form::textarea('bio', null,array($user->type_id,'class'=>'', 'placeholder'=>'Bio')) }}

        </li>
</li>     

            {{ Form::label('photo', 'Photo:', array('class'=>'form-label')) }}
            {{HTML::image('uploads/members/'.$user->username .'.jpg', $user->username,array('class'=>'profile-img'))}}
            {{ Form::file('photo', null, array('class'=>'', 'placeholder'=>'Photo')) }}
        </li>
        <hr>
        <li>
            {{ Form::label('username', 'Username:', array('class'=>'form-label')) }}
            {{ Form::text('username', null, array('class'=>'', 'placeholder'=>'Username')) }}
            
        </li>

        <li>   
        {{ Form::label('password', 'Password:', array('class'=>'form-label')) }}
        {{ Form::password('password', array('class'=>'', 'placeholder'=>'Password')) }}
            
            
        </li>

        <li>
            {{ Form::label('password_confirmation', 'Confirm Password:', array('class'=>'form-label')) }}
            {{ Form::password('password_confirmation', array('class'=>'', 'placeholder'=>'Confirm Password')) }}
        </li>
    
        <hr>
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