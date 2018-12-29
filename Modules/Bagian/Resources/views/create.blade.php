@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Bagian <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('simpan.bagian')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="bagian_nama" class="col-md-12 control-label">Nama Bagian</label>
                        <div class="col-md-12">
                            <input type="text" id="bagian_nama" name="bagian_nama" class="form-control" placeholder="Masukkan Nama Bagian" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

