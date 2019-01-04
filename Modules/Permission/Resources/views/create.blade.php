@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Permission <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('permission.store')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-md-12 control-label">Nama</label>
                        <div class="col-md-12">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama Permission" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="display" class="col-md-12 control-label">Display Nama</label>
                        <div class="col-md-12">
                            <input type="text" id="display" name="display" class="form-control" placeholder="Masukkan Display Nama Permission" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="des" class="col-md-12 control-label">Deskripsi</label>
                        <div class="col-md-12">
                            <textarea name="des" id="des" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi Permission" required></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

