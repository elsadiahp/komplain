@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Detail Komplain <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('save.detkomplain')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf

                    <div class="form-group">
                        <label for="id_kategori" class="col-md-12 control-label">Nama Kategori </label>
                        <div class="col-md-12">
                            <select name="id_kategori[]" class="form-control detail" multiple="multiple">
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($kategori as $kat)
                                    <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

