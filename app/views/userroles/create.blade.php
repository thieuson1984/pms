@extends('layouts.scaffold')

@section('main')
<div class="col-lg-12">
    <h4 class="page-header">{{$pageheader}} | 
    {{ link_to_route('userroles.index', 'Cancel', null, array('class' => 'page-header')) }}
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

{{ Form::open(array('route' => 'userroles.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('parent', 'Parent:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'parent', Input::old('parent'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=>'Name')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('level', 'Level:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'level', Input::old('level'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descr', 'Descr:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('descr', Input::old('descr'), array('class'=>'form-control', 'placeholder'=>'Descr')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}
</div>
@stop


