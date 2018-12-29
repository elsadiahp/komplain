@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <a href="{{route('chart.bulan')}}" class="btn btn-primary">Detail Chart Komplain Perbulan</a>
                <a href="{{route('laporan.area')}}" class="btn btn-primary">Detail Chart Komplain Waroeng</a>
                <a href="{{route('laporan.kategori')}}" class="btn btn-primary">Detail Chart Kategori Komplain Perarea</a>
                <br>
                <br>
                <hr>
                {!! $data->area->render() !!}
                {!! $data->chart->render() !!}
                {!! $data->waroeng->render() !!}
                {!! $data->kategori->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
