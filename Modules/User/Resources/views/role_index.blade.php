@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Role Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('role.create') }}"> Create New Role</a>
                @endpermission
	            <a class="btn btn-success" href="{{ route('role.create') }}"> Create New Role</a>
                
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Jabatan / Bagian</th>
			<th>Deskripsi</th>
			<th>Hak Akses</th>
			<th width="280px">Aksi</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
        <td>{{ $role->description }}</td>
        <td>
            @if(!empty($rolePermissions))
				@foreach($rolePermissions as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
        </td>
		<td>
			{{-- <a class="btn btn-info btn-sm" href="{{ route('role.show',$role->id) }}">Show</a> --}}
			{{-- @permission('role-edit') --}}
			<a class="btn btn-primary btn-sm" href="{{ route('role.edit',$role->id) }}">Edit</a>
			{{-- @endpermission --}}
			{{-- @permission('role-delete') --}}
            <form action="{{route('roles.destroy',['id'=>$role->id])}}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
        	{{-- @endpermission --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $roles->render() !!}
@endsection