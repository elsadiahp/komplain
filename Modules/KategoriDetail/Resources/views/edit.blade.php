@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Edit Detail Kategori Komplain <br></h4>
            </div>
            <br>
            <div class="panel-body">
                <form action="{{route('update.dkategori', $detkategori->kategori_detail_id )}}" method="POST"
                      class="form-horizontal col-md-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_kategori" class="col-md-12 control-label">Nama Kategori</label>
                        <div class="col-md-12">
                            <select name="id_kategori" id="id_kategori" class="form-control" required>
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($kategori as $kat)
                                    @if($kat->id_kategori === $detkategori->id_kategori)
                                        <option value="{{$kat->id_kategori}}"{{$detkategori->id_kategori==$kat->id_kategori?'selected':''}}>{{$kat->nama_kategori}}</option>
                                    @else
                                        <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_dkat" class="col-md-12 control-label">Nama Detail Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_dkat" name="nama_dkat" class="form-control"
                                   value="{{$detkategori->kategori_detail_nama}}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

