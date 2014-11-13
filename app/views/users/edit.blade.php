@extends('layouts.master')
@section('content')
<div class="col-lg-12">
    <h4 class="page-header">{{$pageheader}} | 
    {{ link_to_route('users.index', 'Cancel', null, array('class' => 'page-header')) }}
    </h4>
</div>
<div class="col-lg-12">
        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif

{{ Form::model($user, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

        <div class="form-group">
            {{ Form::label('givenname', 'Givenname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('givenname', Input::old('givenname'), array('class'=>'form-control', 'placeholder'=>'Givenname')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('surname', 'Surname:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('surname', Input::old('surname'), array('class'=>'form-control', 'placeholder'=>'Surname')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('username', 'Username:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('username', Input::old('username'), array('class'=>'form-control', 'placeholder'=>'Username')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=>'Email')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('photo', 'Photo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('photo', Input::old('photo'), array('class'=>'form-control', 'placeholder'=>'Photo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Password:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('password', Input::old('password'), array('class'=>'form-control', 'placeholder'=>'Password')) }}
            </div>
        </div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>
</div>
{{ Form::close() }}

@stop