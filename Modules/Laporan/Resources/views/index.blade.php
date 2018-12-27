@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <a href="{{route('chart.bulan')}}" class="btn btn-primary">Detail Chart Komplain Perbulan</a>
                <a href="{{route('chart.kategori')}}" class="btn btn-primary">Detail Chart Kategori Komplain Perarea</a>
                {!! $data->area->render() !!}
                {!! $data->waroeng->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection