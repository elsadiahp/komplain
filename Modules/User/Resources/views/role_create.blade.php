@extends('back-end.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Tambah Hak Akses</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('permission.index') }}"> Back</a>
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
    <form action="{{route('permissions.store')}}" method="POST" class="form-horizontal col-md-8">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="Nama" class="col-md-12 control-label">Nama</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" placeholder="Nama" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nama" class="col-md-12 control-label">Nama Hak Akses yang Ditampilkan</label>
                    <div class="col-md-12">
                        <input type="text" name="display_name" class="form-control" placeholder="Nama Hak Akses yang Ditampilkan" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nama" class="col-md-12 control-label">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Nama" class="col-md-12 control-label">Pilih Hak Akses</label>
                    <div class="col-md-12">
                        @foreach($permission as $value)
                        <label class="col-md-4">
                            <input type="checkbox" value="{{$value->id}}" name="permission[{{$value->id}}]"> {{ $value->display_name }}
                        </label>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
	</form>
@endsection