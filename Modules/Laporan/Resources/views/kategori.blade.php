@extends('back-end.app')

@section('content')
    <h1>Chart Kategori </h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <a href="{{route('laporan.index')}}" class="btn btn-primary">Kembali</a>
                <form action="{{route('chart.kategori')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    <div class="form-group">
                        <label for="area_id" class="col-md-12 control-label">Tampilkan Tiap Kategori</label>
                        <div class="col-md-12">
                            <select name="kategori" id="bulan" class="form-control" onchange="this.form.submit();" required>
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($data->kat as $kat)
                                    <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                </form>
                {!! $data->komplain->render() !!}
            </div>
            <div class="panel-body">
                <h2>Detail Komplain</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Kategori</th>
                        <th>Waroeng</th>
                        <th>Media Komplain</th>
                        <th>Isi Komplain</th>
                        <th>Tanggal Komplain</th>
                        <th>Waktu Komplain</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                    <tbody>
                    @if (count($komplain)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($komplain as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if ($detail_komplain->komplain_id === $key->komplain_id)
                                        @foreach ($data->kat as $kategori)
                                                @if ($kategori->id_kategori === $detail_komplain->id_kategori)
                                                    <span class="badge badge-dark">{{$kategori->nama_kategori}}</span>
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
                                @if ($key->status == "Komplain Baru")
                                    <td style="color: red;">{{$key->status}}</td>
                                @else
                                @if($key->status == "Butuh Tindak Lanjut")
                                    <td style="color: royalblue;">{{$key->status}}</td>
                                @else
                                    <td>{{$key->status}}</td>
                                @endif
                                @endif
                                <td>{{$key->keterangan}}</td>
                                <td>
                                    <a href="{{ route('komplain.edit',['id'=>$key->komplain_id])}}"
                                       class="btn btn-success btn-sm">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('komplain.destroy',['id'=>$key->komplain_id])}}"method="POST">
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
        </div>
    </div>
</div>
@endsection
