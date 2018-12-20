@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Edit Kategori Komplain <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('update.kategori', $kategori->id_kategori)}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kat" class="col-md-12 control-label">Nama Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="kat" name="kat" class="form-control" value="{{$kategori->nama_kategori}}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

