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
                        <label for="bagian" class="col-md-12 control-label">Nama Bagian</label>
                        <div class="col-md-12">
                            <select name="bagian" id="bagian" class="form-control" required>
                                <option value="">--Pilih Nama Bagian--</option>
                                @foreach($bagian as $b)
                                    <option value="{{$b->bagian_id}}">{{$b->bagian_nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent_kat" class="col-md-12 control-label">Nama Parent Kategori Komplain</label>
                        <div class="col-md-12">
                            <select name="parent_kat" id="parent_kat" class="form-control">
                                <option value="">--Pilih Nama Parent Kategori Komplain --</option>
                                @foreach($kat as $k)
                                    @if($k->id_kategori_parent === null)
                                        <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kat" class="col-md-12 control-label">Nama Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="kat" name="kat" class="form-control"
                                   placeholder="Masukkan Nama Kategori Komplain" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

