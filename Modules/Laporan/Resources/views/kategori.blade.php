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
                                    @foreach($data->kat as $ktgr)
                                        <option value="{{$ktgr->id_kategori}}">{{$ktgr->nama_kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </form>
                    {!! $data->kategori->render() !!}
                </div>
                <br>
                <br>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Bagian</th>
                        <th>Parent Kategori</th>
                        <th>Kategori Detail</th>
                        <th>Waroeng</th>
                        <th>Media Komplain</th>
                        <th>Isi Komplain</th>
                        <th>Tanggal Komplain</th>
                        <th>Waktu Komplain</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                    <tbody>
                    @if (count($kategori)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($kategori as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>
                                    {{--@foreach ($data->detail_komplain as $detail_komplain)--}}
                                        {{--@if($detail_komplain->komplain_id === $key->komplain_id)--}}
                                            {{--@foreach($data->kateg as $kategori)--}}
                                            {{--@if($kategori->id_kategori === $detail_komplain->id_kategori)--}}
                                                    {{--<span>{{$kategori->id_kategori_parent. ','}}</span>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--@endif--}}
                                    {{--@endforeach--}}
                                </td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if($detail_komplain->komplain_id === $key->komplain_id)
                                            @foreach($data->kateg as $kategori)
                                                @if($kategori->id_kategori === $detail_komplain->id_kategori && $kategori->id_kategori_parent === $kategori->id_kategori)
                                                    <span>{{$kategori->nama_kategori. ','}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($data->detail_komplain as $detail_komplain)
                                        @if($detail_komplain->komplain_id === $key->komplain_id)
                                            @foreach($data->kateg as $sub)
                                                @if($sub->id_kategori === $detail_komplain->id_kategori)
                                                    @if($sub->id_kategori_parent !== null)
                                                        <span>{{$sub->nama_kategori. ','}}</span>
                                                    @endif
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
        </div>
    </div>
@endsection
