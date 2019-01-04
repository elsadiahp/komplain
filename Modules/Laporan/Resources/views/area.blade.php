@extends('back-end.app')

@section('content')
    @if($tampil !== null)
        <h1>Chart Komplain {{$tampil->area_nama}}</h1>
    @else
        <h1>Chart Komplain Semua Area</h1>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('laporan.index')}}" class="btn btn-primary" style="margin-bottom: 20px;">Kembali</a>
                <form action="{{route('laporan.area')}}" method="get">
                    <div class="form-group">
                        <label for="area_id">Nama Area </label>
                        <select name="area_id" class="form-control detail" onchange="this.form.submit();" >
                            <option value="">--Pilih Nama area--</option>
                            @foreach($data->are as $a)
                                <option value="{{$a->area_id}}">{{$a->area_nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="panel-body">
                    {!! $data->area->render() !!}
                </div>
            </div>
            <div class="col-md-12">
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
                    @if (count($area)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($area as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if ($detail_komplain->komplain_id === $key->komplain_id)
                                            @foreach ($data->kategori as $kategori)
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
@endsection
