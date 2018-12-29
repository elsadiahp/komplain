@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Detail Kategori Komplain <br></h4>
            </div>
            <br>
            <div class="panel-body">
                <form action="{{route('simpan.dkategori')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf

                    <div class="form-group">
                        <label for="id_kategori" class="col-md-12 control-label">Nama Kategori</label>
                        <div class="col-md-12">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($data->kat as $kat)
                                    <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_dkat" class="col-md-12 control-label">Nama Detail Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_dkat" name="nama_dkat" class="form-control"
                                   placeholder="Masukkan Nama Detail Kategori Komplain" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

