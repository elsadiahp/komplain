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
                    <br>
                <a href="{{ route('komplain.create')}}" class="btn btn-primary btn-sm pull-left marginBottom20px"><span
                        class="glyphicon glyphicon-plus"> Tambah</span></a>
                    <br>
                    <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Kategori</th>
                        <th>Kategori Detail</th>
                        <th>Waroeng</th>
                        <th>Media Komplain</th>
                        <th>Isi Komplain</th>
                        <th>Tanggal Komplain</th>
                        <th>Waktu Komplain</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                    <tbody>
                    @if (count($data->komplain)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($data->komplain as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if ($detail_komplain->komplain_id === $key->komplain_id)
                                            @foreach ($data->detail_kategori as $kategori)
                                                @if ($kategori->kategori_detail_id === $detail_komplain->kategori_detail_id)
                                                    @foreach($data->kategori as $kat)
                                                        @if($kat->id_kategori === $kategori->id_kategori)
                                                             <span class="label label-info">{{ $kat->nama_kategori . ',' }}</span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if ($detail_komplain->komplain_id === $key->komplain_id)
                                            @foreach ($data->detail_kategori as $kategori)
                                                @if ($kategori->kategori_detail_id === $detail_komplain->kategori_detail_id)
                                                    <span
                                                        class="label label-info">{{ $kategori->kategori_detail_nama . ',' }}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$key->waroeng_nama}}</td>
                                <td>{{$key->media_koplain}}</td>
                                <td>{{$key->isi_komplain}}</td>
                                <td>{{$key->tanggal_komplain}}</td>
                                <td>{{$key->waktu_komplain}}</td>
                                <td>
                                    <a href="{{ route('komplain.edit',['id'=>$key->komplain_id])}}"
                                       class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('komplain.destroy',['id'=>$key->komplain_id])}}"
                                          method="POST">
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
            </div>


            {{--<div class="col-md-12">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div id="chartWaroeng" style="height: 370px; width: 100%;"--}}
                         {{--url="{{route('komplain.chart',['p'=>'waroeng_id'])}}" title="Waroeng"></div>--}}
                {{--</div>--}}
                {{--<div class="col-md-12">--}}
                    {{--<div id="chartArea" style="height: 370px; width: 100%;"--}}
                         {{--url="{{route('komplain.chart', ['p'=>'area_id'])}}" title="Area"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
@endsection
{{--@section('js')--}}

    {{--<script type="text/javascript" src="//canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--var G9 = function () {--}}
            {{--var initChart = function (id) {--}}
                {{--var items = [];--}}
                {{--$id1 = $('#' + id);--}}
                {{--var idr = id;--}}
                {{--idr = new CanvasJS.Chart(id, {--}}
                    {{--exportEnabled: true,--}}
                    {{--animationEnabled: true,--}}
                    {{--title: {--}}
                        {{--text: $id1.attr('title')--}}
                    {{--},--}}
                    {{--legend: {--}}
                        {{--horizontalAlign: "right",--}}
                        {{--verticalAlign: "center"--}}
                    {{--},--}}
                    {{--data: [{--}}
                        {{--type: "pie",--}}
                        {{--showInLegend: true,--}}
                        {{--percentFormatString: "#",--}}
                        {{--toolTipContent: "<b>{name}</b>: Total {y} - #percent %",--}}
                        {{--indexLabel: "(#percent%)",--}}
                        {{--legendText: "{name} Total {y} (#percent%)",--}}
                        {{--dataPoints: items--}}
                    {{--}]--}}
                {{--});--}}

                {{--$.get($id1.attr('url'), function (data) {--}}

                {{--}).then(function (data) {--}}

                    {{--$.each(data, function (d, i) {--}}
                        {{--items.push({--}}
                            {{--y: parseInt(i.v),--}}
                            {{--name: i.name--}}
                        {{--});--}}
                    {{--});--}}
                {{--})--}}
                    {{--.done(function () {--}}
                        {{--idr.render()--}}
                    {{--});--}}
            {{--};--}}
            {{--return {--}}
                {{--Chart: function (id) {--}}
                    {{--initChart(id)--}}
                {{--}--}}
            {{--}--}}
        {{--}();--}}
        {{--window.onload = function() {--}}
            {{--G9.Chart("chartArea");--}}
            {{--G9.Chart("chartWaroeng");--}}
        {{--};--}}
    {{--</script>--}}
{{--@endsection--}}


