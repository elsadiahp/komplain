@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.store')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="waroeng_id">Waroeng</label>
                        <select class="selection form-control" id="waroeng_id" name="waroeng_id">
                            <option value="">-</option>
                        @foreach ($data->waroeng as $key)
                            <option value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" id="media_komplain" name="media_komplain">
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_komplain">Tanggal Komplain</label>

                        <input class="form-control" id="tanggal_komplain" name="tanggal_komplain" type="date">
                    </div>
                    <div class="form-group">
                        <label for="waktu_komplain">Waktu Komplain</label>
                        <input class="form-control" id="waktu_komplain" name="waktu_komplain" type="time">

                        <input class="form-control" name="tanggal_komplain" type="date" value="{{date('m/d/Y')}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Waktu Komplain</label>
                        <input class="form-control" name="waktu_komplain" type="time" value="{{date('H:i')}}">

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
