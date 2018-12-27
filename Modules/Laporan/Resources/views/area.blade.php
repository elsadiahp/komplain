@extends('back-end.app')

@section('content')
    <h1>Chart</h1>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('laporan.area')}}" method="get">
                    <div class="form-group">
                        <label for="area_id">Nama Area </label>
                        <select name="area_id" class="form-control detail">
                            <option value="">--Pilih Nama area--</option>
                            @foreach($data->are as $a)
                                <option value="{{$a->area_id}}">{{$a->area_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>Pilih</button>
                    </span>
                </form>
                <div class="panel-body">
                    {!! $data->area->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
