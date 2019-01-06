@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit New User</h2>
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
    <form action="{{route('users.update',$user->id)}}" method="POST" class="form-horizontal col-md-8">
	<div class="row">
		<div class="col-md-12">
                @method('PATCH')
                @csrf
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" placeholder="Nama" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" placeholder="Email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control" value="{{$user->password}}">
            </div>
            <div class="form-group">
                <label for="">Konfirmasi Password</label>
                <input type="password" placeholder="Konfirmasi Password" name="confirm-password" class="form-control" value="{{$user->password}}">
            </div>
            <div class="form-group">
                <label for="">Bagian / Jabatan</label>
                <select name="roles" id="roles" class="form-control" required>
                        <option value="">-Pilih Bagian / Jabatan-</option>
                        @foreach($roles as $role)
                            @if($role->id === $userRole->role_id)
                                <option value="{{$role->id}}"{{$role->id==$userRole->role_id?'selected':''}}>{{$role->display_name}}</option>
                            @else
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
	</div>
    </form>
@endsection