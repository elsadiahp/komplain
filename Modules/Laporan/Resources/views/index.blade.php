@extends('back-end.app')

@section('content')

    {!! Charts::styles() !!}
    <div class="app">
        <center>
            {!! $chart->html !!}
        </center>
    </div>
    {!! Charts::scripts() !!}
    {{--{!! $chart::script() !!}--}}

@endsection

    <h1>Laporan</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                {!! $data->chart->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
