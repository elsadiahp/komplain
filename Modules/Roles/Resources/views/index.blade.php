@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h1>Jabatan / Bagian</h1>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Tambah </a>
                @endpermission
	            <a class="btn btn-primary" href="{{ route('roles.create') }}"> Tambah</a>
                
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
			<th width="280px">Aksi</th>
		</tr>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>
			{{-- @permission('role-edit') --}}
			<a class="btn btn-success btn-sm" href="{{ route('roles.edit',$role->id) }}">Edit</a>
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