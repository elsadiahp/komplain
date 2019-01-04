@extends('back-end.app')

@section('content')
    <h1>Area</h1>
    <br>
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
                <br>
                <a href="{{ route('permission.create')}}" class="btn btn-primary btn-sm pull-left" style="margin-button:20px;"><span class="glyphicon glyphicon-plus"> Tambah</span></a>
                <br>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Nama</th>
                        <th>Display Nama</th>
                        <th>Deskripsi</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($data->index) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data Area</td>
                        </tr>
                    @else
                        @foreach ($data->index as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->name}}</td>
                                <td>{{$key->display_name}}</td>
                                <td>{{$key->description}}</td>
                                <td align="right"><a href="{{route('permission.edit', $key->id)}}" class="btn btn-success btn-sm">Edit</a></td>
                                <td align="left">
                                    <form action="{{route('permission.destroy', $key->id)}}" method="POST">
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
                {{--{{ $data->index->links() }}--}}
            </div>
        </div>
    </div>
@stop
