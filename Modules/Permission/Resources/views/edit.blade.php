@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Edit Permission <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('permission.edit', $permission->id)}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name" class="col-md-12 control-label">Nama</label>
                        <div class="col-md-12">
                            <input type="text" id="name" name="name" class="form-control" value="{{$permission->name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="display" class="col-md-12 control-label">Display Nama</label>
                        <div class="col-md-12">
                            <input type="text" id="display" name="display" class="form-control" value="{{$permission->display_name}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="des" class="col-md-12 control-label">Deskripsi</label>
                        <div class="col-md-12">
                            <input type="text" id="des" name="des" class="form-control" value="{{$permission->description}}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

