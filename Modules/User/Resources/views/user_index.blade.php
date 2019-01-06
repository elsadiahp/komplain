@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h1>Users</h1>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.create') }}">Tambah</a>
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
			<th>Name</th>
			<th>Email</th>
			{{-- <th>Area</th>
			<th>Waroeng</th> --}}
			<th>Bagian / Jabatan</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		{{-- <td>{{ $user->area_nama }}</td>
		<td>{{ $user->waroeng_nama }}</td> --}}
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-success btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
            <form action="{{route('users.destroy',['id'=>$user->id])}}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection