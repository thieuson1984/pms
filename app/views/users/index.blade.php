@extends('layouts.master')
@section('content')
<div class="col-lg-12">
    <h4 class="page-header">{{$pageheader}} | 
    {{ link_to_route('users.create', 'Add New User', null, array('class' => 'page-header')) }}
    </h4>
</div>
<div class="col-lg-12">
@if ($users->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Givenname</th>
				<th>Surname</th>
				<th>Username</th>
				<th>Email</th>
				<th>Photo</th>
				<th>Access</th>
				<th>Active</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{{ $user->givenname }}}</td>
					<td>{{{ $user->surname }}}</td>
					<td>{{{ $user->username }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->photo }}}</td>
					<td>{{{ $user->access }}}</td>
					<td>{{{ $user->active }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no users
@endif
</div>
@stop
