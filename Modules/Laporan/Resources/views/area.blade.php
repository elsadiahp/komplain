@extends('back-end.app')

@section('content')
    @if($tampil !== null)
        <h1>Chart Komplain {{$tampil->area_nama}}</h1>
    @else
        <h1>Chart Komplain Area</h1>
    @endif

    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('laporan.index')}}" class="btn btn-warning">Kembali</a>
                <br>
                <br>
                <form action="{{route('laporan.area')}}" method="get">
                    <div class="form-group">
                        <label for="area_id">Nama Area </label>
                        <select name="area_id" class="form-control detail" onchange="this.form.submit();" >
                            <option value="">--Pilih Nama area--</option>
                            @foreach($data->are as $a)
                                <option value="{{$a->area_id}}">{{$a->area_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="panel-body">
                    {!! $data->area->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
