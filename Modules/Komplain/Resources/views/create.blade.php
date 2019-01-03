@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="bagian">Nama Bagian </label>
                        <select name="bagian[]" class="form-control detail" multiple="multiple" required>
                            <option value="">--Pilih Nama Bagian--</option>
                            @foreach($data->bagian as $bag)
                                <option value="{{$bag->bagian_id}}">{{$bag->bagian_nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parent">Nama Kategori </label>
                        <select name="parent[]" class="form-control detail" multiple="multiple" required>
                            <option value="">--Pilih Nama Kategori--</option>
                            @foreach($data->kategori as $dkat)
                                <option value="{{$dkat->id_kategori}}">{{$dkat->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Nama Sub Kategori </label>
                        <select name="kategori[]" class="form-control detail" multiple="multiple" required>
                            <option value="">--Pilih Nama Sub Kategori--</option>
                            @foreach($data->sub as $sub)
                                <option value="{{$sub->id_kategori}}">{{$sub->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="waroeng_id">Waroeng</label>
                        <select class="selection form-control" id="waroeng_id" name="waroeng_id" required>
                            <option value="">-</option>
                        @foreach ($data->waroeng as $key)
                            <option value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" id="media_komplain" name="media_komplain" required>
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_komplain">Tanggal Komplain</label>
                        <input class="form-control" name="tanggal_komplain" type="date" value="{{date('m/d/Y')}}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Waktu Komplain</label>
                        <input class="form-control" name="waktu_komplain" type="time" value="{{date('H:i')}}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
