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
