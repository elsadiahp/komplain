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
                <a href="{{ route('komplain.create')}}" class="btn btn-primary btn-sm pull-right marginBottom20px"><span class="glyphicon glyphicon-plus"> Tambah</span></a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>Kategori</th>
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
                                <td>
                                @foreach ($data->detail_komplain as $detail_komplain)
                                    @if ($detail_komplain->komplain_id === $key->komplain_id)

                                        @foreach ($data->kategori as $kategori)
                                            @if ($kategori->id_kategori === $detail_komplain->id_kategori)
                                                <span class="label label-info">{{ $kategori->nama_kategori . ',' }}</span>
                                            @endif
                                        @endforeach
                                        @endif
                                @endforeach
                                </td>
                                <td>{{$key->waroeng->waroeng_nama}}</td>
                                <td>{{$key->media_koplain}}</td>
                                <td>{{$key->isi_komplain}}</td>
                                <td>{{$key->tanggal_komplain}}</td>
                                <td>{{$key->waktu_komplain}}</td>
                                <td>
                                    <a href="{{ route('komplain.edit',['id'=>$key->komplain_id])}}" class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('komplain.destroy',['id'=>$key->komplain_id])}}" method="POST">
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
            {{ $data->komplain->links() }}
            <div class="col-md-12">
                    <div id="chart"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="http://d3js.org/d3.v3.min.js"></script>

<script>
var w = 400;
var h = 400;
var r = h/2;
var aColor = [
    'rgb(178, 55, 56)',
    'rgb(213, 69, 70)',
    'rgb(128, 0, 0)',
    'rgb(139, 0, 0)',
    'rgb(165, 42, 42)',
    'rgb(178, 34, 34)',
    'rgb(220, 20, 60)',
    
]

var data = [
    @foreach($data->komplain2 as $i)
    {"label":"<?= $i->waroeng->waroeng_nama ?>", "value":<?= $i->total ?>}, 
    @endforeach
    ];


var vis = d3.select('#chart').append("svg:svg").data([data]).attr("width", w).attr("height", h).append("svg:g").attr("transform", "translate(" + r + "," + r + ")");

var pie = d3.layout.pie().value(function(d){return d.value;});

// Declare an arc generator function
var arc = d3.svg.arc().outerRadius(r);

// Select paths, use arc generator to draw
var arcs = vis.selectAll("g.slice").data(pie).enter().append("svg:g").attr("class", "slice");
arcs.append("svg:path")
    .attr("fill", function(d, i){return aColor[i];})
    .attr("d", function (d) {return arc(d);})
;

// Add the text
arcs.append("svg:text")
    .attr("transform", function(d){
        d.innerRadius = 100; /* Distance of label to the center*/
        d.outerRadius = r;
        return "translate(" + arc.centroid(d) + ")";}
    )
    .attr("text-anchor", "middle")
    .text( function(d, i) {return data[i].value + '%';})
;
</script>
@endsection