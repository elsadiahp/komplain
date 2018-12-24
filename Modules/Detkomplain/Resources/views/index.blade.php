@extends('back-end.app')

@section('content')
    <h1>Detail Komplain</h1>
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
    <a href="{{route('tambah.detkomplain')}}" class="btn btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row ">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($data->detkom) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data Area</td>
                        </tr>
                    @else
                        @foreach ($data->detkom as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                {{-- <td>{{$key->area_nama}}</td> --}}
                                <td>
                                    {{-- <a href="{{ route('area.edit',['id'=>$key->area_id])}}" class="btn btn-success btn-sm">Edit</a> --}}
                                </td>
                                <td>
                                    {{-- <form action="{{route('area.destroy',['id'=>$key->area_id])}}" method="POST"> --}}
                                        @csrf
                                        @method('DELETE')
                                        {{-- <button class="btn btn-danger btn-sm" type="submit">Delete</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach   
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
