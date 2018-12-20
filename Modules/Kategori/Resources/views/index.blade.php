@extends('back-end.app')

@section('content')
    <h1>Kategori</h1>
    <br>
    <a href="{{route('tambah.kategori')}}" class="btn btn-primary">Tambah</a>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($kat->kat as $kat)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$kat->nama_kategori}}</td>
                <td><a href="{{route('edit.kategori', $kat->id_kategori)}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{route('destroy.kategori', $kat->id_kategori)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
