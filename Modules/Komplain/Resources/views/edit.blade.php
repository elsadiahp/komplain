@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.update', $data->komplain->komplain_id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="selection form-control" name="id_kategori">
                            <option value="">-</option>
                        @foreach ($data->kategori as $key)
                            @if ($key->id_kategori === $data->komplain->id_kategori)
                                <option selected value="{{$key->id_kategori}}">{{$key->nama_kategori}}</option>
                            @else
                                <option value="{{$key->id_kategori}}">{{$key->nama_kategori}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kategori_id">Waroeng</label>
                        <select class="selection form-control" name="waroeng_id">
                            <option value="">-</option>
                        @foreach ($data->waroeng as $key)
                            @if ($key->waroeng_id === $data->komplain->waroeng_id)
                                <option selected value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                            @else
                            <option value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" name="media_komplain" value="{{$data->komplain->media_koplain}}">
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10" class="form-control">{{$data->komplain->isi_komplain}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Tanggal Waktu Komplain</label>
                        <input class="form-control" name="tanggal_jam_komplain" type="datetime-local" value="{{$data->komplain->tanggal_jam_komplain}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
