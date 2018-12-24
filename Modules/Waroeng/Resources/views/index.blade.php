@extends('back-end.app')

@section('content')
    <h1>Waroeng</h1>
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
    <a href="{{route('tambah.waroeng')}}" class="btn btn-primary">Tambah</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Waroeng</th>
            <th>Alamat Waroeng</th>
            <th>Nama Area</th>
            <th colspan="2" class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @if (count($waroeng) == 0)
            <tr>
                <td colspan="4" class="text-center">Tidak Ada Data Waroeng</td>
            </tr>
        @else
        @foreach($waroeng as $waroeng)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$waroeng->waroeng_nama}}</td>
                <td>{{$waroeng->waroeng_alamat}}</td>
                <td>{{$waroeng->area->area_nama}}</td>
                <td align="right"><a href="{{route('edit.waroeng', $waroeng->waroeng_id)}}" class="btn btn-success btn-sm">Edit</a></td>
                <td align="left">
                    <form action="{{route('destroy.waroeng', $waroeng->waroeng_id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
 @stop
