@extends('back-end.app')

@section('content')
    <h1>Kategori</h1>
    <br>
    @if (Session::has('success'))
        <div class="alert alert-success">
            <strong>Success! </strong>{{ Session::get('success')}}
        </div>
    @elseif (Session::has('delete'))
        <div class="alert alert-danger">
            <strong>Delete! </strong>{{ Session::get('delete')}}
        </div>
    @endif
    <br>
    <a href="{{route('tambah.dkategori')}}" class="btn btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row ">
        <div class="col-md-12">
            <table class="table table-striped" width="1200px">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nama Detail Kategori</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->detkategori as $dkat)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$dkat->tb_kategori->nama_kategori}}</td>
                        <td>{{$dkat->kategori_detail_nama}}</td>
                        <td align="right"><a href="{{route('edit.dkategori', $dkat->kategori_detail_id)}}" class="btn btn-success btn-sm">Edit</a></td>
                        <td align="left">
                            <form action="{{route('destroy.dkategori', $dkat->kategori_detail_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
