@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <br>
    <a href="{{route('laporan.area')}}" class="btn btn-primary">Detail Chart Komplain Waroeng</a>
    <a href="{{route('laporan.kategori')}}" class="btn btn-primary">Detail Chart Komplain Kategori</a>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <a href="{{route('chart.bulan')}}" class="btn btn-primary">Detail Chart Komplain Perbulan</a>
                <a href="{{route('chart.kategori')}}" class="btn btn-primary">Detail Chart Kategori Komplain Perarea</a>
            </div>
        </div>
    </div>
</div>
@endsection
