@extends('back-end.app')

@section('content')
    <h1>Kategori Bagian</h1>
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
    <a href="{{route('tambah.bagian')}}" class="btn btn-primary">Tambah</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Bagian</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @if (count($data->bagian) == 0)
            <tr>
                <td colspan="4" class="text-center">Tidak Ada Data Waroeng</td>
            </tr>
        @else
            @foreach($data->bagian as $bagian)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$bagian->bagian_nama}}</td>
                    <td align="right"><a href="{{route('edit.bagian', $bagian->bagian_id)}}" class="btn btn-warning">Edit</a></td>
                    <td align="left">
                        <form action="{{route('destroy.bagian', $bagian->bagian_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@stop
