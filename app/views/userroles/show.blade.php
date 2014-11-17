@extends('layouts.scaffold')

@section('main')
<div class="col-lg-12">
    <h4 class="page-header">{{$pageheader}} | 
    {{ link_to_route('userroles.index', 'Back to list', null, array('class' => 'page-header')) }}
    </h4>
</div>
<div class="col-lg-12">
<table class="table table-striped">
	<thead>
		<tr>
			<th>Parent</th>
				<th>Name</th>
				<th>Level</th>
				<th>Descr</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $userrole->parent }}}</td>
					<td>{{{ $userrole->name }}}</td>
					<td>{{{ $userrole->level }}}</td>
					<td>{{{ $userrole->descr }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('userroles.destroy', $userrole->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('userroles.edit', 'Edit', array($userrole->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>
</div>
@stop
