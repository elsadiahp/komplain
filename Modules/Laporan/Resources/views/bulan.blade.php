@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <form action="{{route('chart.bulan')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="area_id" class="col-md-12 control-label">Pilih Bulan</label>
                        <div class="col-md-12">
                            <select name="bulan" id="bulan" class="form-control" required>
                                <option value="">--Pilih Nama Bulan--</option>
                                @foreach($data->bulan as $bulan)
                                    <option value="{{$bulan->nm}}">{{$bulan->month}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </form>
                {!! $data->chart->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
