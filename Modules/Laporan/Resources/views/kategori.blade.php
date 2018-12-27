@extends('back-end.app')

@section('content')

    <h1>Chart</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('laporan.kategori')}}" method="get">
                    <div class="form-group">
                        <label for="id_kategori">Nama Kategori </label>
                        <select name="id_kategori" class="form-control detail">
                            <option value="">--Pilih Nama Kategori--</option>
                            @foreach($data->kat as $kat)
                                <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>Pilih</button>
                    </span>
                </form>
                <div class="panel-body">
                    {!! $data->kategori->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
