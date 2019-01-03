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
    <a href="{{route('tambah.kategori')}}" class="btn btn-primary">Tambah</a>
    <br>
    <br>
    <div class="row ">
        <div class="col-md-12">
            <table class="table table-striped" width="1200px">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori Bagian</th>
                    <th>Nama Kategori</th>
                    {{--<th>Nama Sub Kategori</th>--}}
                    <th colspan="2" class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kat->kat as $i)
                    @if($i->id_kategori_parent === null )

                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$i->bagian_nama}}</td>
                        <td><b>{{$i->nama_kategori}}</b></td>
                        <td align="right"><a href="{{route('edit.kategori', $i->id_kategori)}}"
                                             class="btn btn-success btn-sm">Edit</a></td>
                        <td align="left">
                            <form action="{{route('destroy.kategori', $i->id_kategori)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    @foreach($kat->sub as $sub)
                        @if($sub->id_kategori_parent === $i->id_kategori)
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <span>{{$sub->nama_kategori}}</span><br>
                                </td>
                                <td align="right"><a href="{{route('edit.kategori', $sub->id_kategori)}}"
                                                     class="btn btn-primary btn-sm">Edit</a></td>
                                <td align="left">
                                    <form action="{{route('destroy.kategori', $sub->id_kategori)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
