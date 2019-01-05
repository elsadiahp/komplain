@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h1>Hak Akses</h1>
	        </div>
	        <div class="pull-right">
	        	@permission('permission-create')
	            <a class="btn btn-primary" href="{{ route('permission.create') }}">Tambah </a>
                @endpermission
	            <a class="btn btn-primary" href="{{ route('permission.create') }}">Tambah</a>
                
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
            <th>Nama Hak Akses</th>
			<th>Jabatan / Bagian</th>
			<th>Deskripsi</th>
			<th width="280px">Aksi</th>
		</tr>
	@foreach ($permission as $key => $permissions)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $permissions->name }}</td>
		<td>{{ $permissions->display_name }}</td>
		<td>{{ $permissions->description }}</td>
		<td>
			{{-- @permission('permission-edit') --}}
			<a class="btn btn-success btn-sm" href="{{ route('permission.edit',$permissions->id) }}">Edit</a>
			{{-- @endpermission --}}
			{{-- @permission('permission-delete') --}}
            <form action="{{route('permission.destroy',['id'=>$permissions->id])}}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
        	{{-- @endpermission --}}
		</td>
	</tr>
	@endforeach
	</table>
	{!! $permission->render() !!}
@endsection