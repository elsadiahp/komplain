@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                {!! $data->chart->render() !!}
                {!! $data->kategori->render() !!}
                {!! $data->area->render() !!}
                {!! $data->waroeng->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection