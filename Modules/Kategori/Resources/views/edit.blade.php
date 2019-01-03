@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Edit Kategori Komplain <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('update.kategori', $kat->id_kategori)}}" method="POST"
                      class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="bagian" class="col-md-12 control-label">Nama Bagian</label>
                        <div class="col-md-12">
                            <select name="bagian" id="bagian" class="form-control" required>
                                <option value="">--Pilih Nama Bagian--</option>
                                @foreach($bagian as $b)
                                    @if($b->bagian_id === $kat->bagian_id || $b->bagian_id === @$kat->tb_kategori->bagian_id)
                                        <option selected value="{{$b->bagian_id}}">{{$b->bagian_nama}}</option>
                                    @else
                                        <option value="{{$b->bagian_id}}">{{$b->bagian_nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent_kat" class="col-md-12 control-label">Nama Parent Kategori Komplain</label>
                        <div class="col-md-12">
                            <select name="parent_kat" id="parent_kat" class="form-control">
                                <option value="">--Pilih Nama Parent Kategori Komplain --</option>
                                @foreach($kategori as $k)
                                    @if($k->id_kategori_parent===null)
                                        @if($k->id_kategori === $kat->id_kategori_parent)
                                            <option value="{{$k->id_kategori}}" selected>{{$k->nama_kategori}}</option>
                                        @else
                                            <option value="{{$k->id_kategori}}">{{$k->nama_kategori}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kat" class="col-md-12 control-label">Nama Kategori Komplain</label>
                        <div class="col-md-12">
                            <input type="text" id="kat" name="kat" class="form-control" value="{{$kat->nama_kategori}}"
                                   required>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

