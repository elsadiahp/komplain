@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <strong>Success! </strong>{{ Session::get('success')}}
                    </div>
                @elseif (Session::has('delete'))
                    <div class="alert alert-danger">
                        <strong>Delete! </strong>{{ Session::get('delete')}}
                    </div>
                @endif
                <h1>Komplain</h1>
                <a href="{{ route('komplain.create')}}" class="btn btn-primary btn-sm pull-right marginBottom20px"><span
                        class="glyphicon glyphicon-plus"> Tambah</span></a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Waroeng</th>
                        <th>Media Komplain</th>
                        <th>Isi Komplain</th>
                        <th>Tanggal Komplain</th>
                        <th>Waktu Komplain</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($data->komplain)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($data->komplain as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->waroeng->waroeng_nama}}</td>
                                <td>{{$key->media_koplain}}</td>
                                <td>{{$key->isi_komplain}}</td>
                                <td>{{$key->tanggal_komplain}}</td>
                                <td>{{$key->waktu_komplain}}</td>
                                <td align="right">
                                    <a href="{{ route('komplain.edit', $key->komplain_id)}}"
                                       class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td align="left">
                                    <form action="{{route('komplain.destroy', $key->komplain_id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <br>
                <br>
                <hr>

            </div>
            {{--<a href="{{route('komplain.chart')}}" class="btn btn-primary">Chart</a>--}}
            <div class="col-md-12">
            <div class="col-md-4">
                <div id="chartWaroeng" style="height: 370px; width: 100%;" url="{{route('komplain.chart',['p'=>'waroeng_id'])}}" title="Waroeng"></div>
            </div>
                <div class="col-md-4">
                    <div id="chartArea" style="height: 370px; width: 100%;" url="{{route('komplain.chart', ['a'=>'area_id'])}}" title="Area"></div>
                </div>
                <div class="col-md-4">
                    <div id="chartKategori" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="//canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script type="text/javascript">
        $(function () {
            G9Chart("#chartWaroeng")
        });
        function G9Chart(id){
            $id = $(id);
            $.getJSON($id.attr('url'), function (data) {
                var items = [];
                $.each(data, function (d, i) {
                    items.push({
                        y: i.value,
                        name: i.waroeng.waroeng_nama
                    });
                });
                $id.CanvasJSChart({
                    exportEnabled: true,
                    animationEnabled: true,
                    title: {
                        text: $id.attr('title')
                    },
                    legend: {
                        horizontalAlign: "right",
                        verticalAlign: "center"
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        toolTipContent: "<b>{name}</b>: ${y} (#percent%)",
                        indexLabel: "{name}",
                        legendText: "{name} (#percent%)",
                        indexLabelPlacement: "inside",
                        dataPoints: items
                    }]
                });
            })
        }
    </script>

    {{--<script type="text/javascript">--}}
        {{--$(function () {--}}
            {{--G9Chart("#chartArea")--}}
        {{--});--}}
        {{--function G9Chart(id){--}}
            {{--$id = $(id);--}}
            {{--$.getJSON($id.attr('url'), function (data) {--}}
                {{--var items = [];--}}
                {{--$.each(data, function (d, i) {--}}
                    {{--items.push({--}}
                        {{--y: i.value,--}}
                        {{--name: i.waroeng.area_id--}}
                    {{--});--}}
                {{--});--}}
                {{--$id.CanvasJSChart({--}}
                    {{--exportEnabled: true,--}}
                    {{--animationEnabled: true,--}}
                    {{--title: {--}}
                        {{--text: $id.attr('title')--}}
                    {{--},--}}
                    {{--legend: {--}}
                        {{--horizontalAlign: "right",--}}
                        {{--verticalAlign: "center"--}}
                    {{--},--}}
                    {{--data: [{--}}
                        {{--type: "pie",--}}
                        {{--showInLegend: true,--}}
                        {{--toolTipContent: "<b>{name}</b>: ${y} (#percent%)",--}}
                        {{--indexLabel: "{name}",--}}
                        {{--legendText: "{name} (#percent%)",--}}
                        {{--indexLabelPlacement: "inside",--}}
                        {{--dataPoints: items--}}
                    {{--}]--}}
                {{--});--}}
            {{--})--}}
        {{--}--}}
    {{--</script>--}}

@endsection

