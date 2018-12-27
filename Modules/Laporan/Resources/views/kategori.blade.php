@extends('back-end.app')

@section('content')
    <h1>Chart Kategori</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <form action="{{route('chart.kategori')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="area_id" class="col-md-12 control-label">Tampilkan Tiap Kategori</label>
                        <div class="col-md-12">
                            <select name="kategori" id="bulan" class="form-control" onchange="this.form.submit();" required>
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($data->kat as $kategori)
                                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </form>
                {!! $data->kategori->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
