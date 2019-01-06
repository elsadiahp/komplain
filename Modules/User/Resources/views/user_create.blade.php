@extends('back-end.app')
 
@section('content')
	<div class="row">
        <div class="col-md-12">
	        <div class="pull-left">
	            <h2>Tambah User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" placeholder="Nama" name="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" placeholder="Email" name="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Bagian / Jabatan</label>
                    <select class="selection form-control" id="roles" name="roles">
                        <option value="0" disable="true" selected="true">-Pilih Bagian / Jabatan-</option>
                            @foreach ($roles as $key)
                                <option value="{{$key->id}}">{{$key->display_name}}</option>
                            @endforeach
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </form>
@endsection