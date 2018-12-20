@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Kategori Komplain <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('simpan.kategori')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="kat" class="col-md-12 control-label">Nama Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="kat" name="kat" class="form-control" placeholder="Masukkan Nama Kategori Komplain" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

