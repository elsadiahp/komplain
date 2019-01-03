@extends('back-end.app')

@section('content')
    @if($kateg !== null)
        <h1>Chart Kategori {{$kateg->nama_kategori}}</h1>
        @else
        <h1>Chart Kategori</h1>

    @endif
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <a href="{{route('laporan.index')}}" class="btn btn-warning">Kembali</a>
                    <br>
                    <br>
                    <form action="{{route('laporan.kategori')}}" method="POST" class="form-horizontal col-md-8">
                        @csrf
                        <div class="form-group">
                            <label for="kategori" class="col-md-12 control-label">Tampilkan Tiap Kategori</label>
                            <div class="col-md-12">
                                <select name="kategori" id="bulan" class="form-control" onchange="this.form.submit();"
                                        required>
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
