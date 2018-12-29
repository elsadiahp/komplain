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
                <a href="{{ route('komplain.create')}}" class="btn btn-primary">Tambah</a>
                <br>
                <br>
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
                                                    <span class="label label-primary">{{$kategori->nama_kategori}}</span>
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