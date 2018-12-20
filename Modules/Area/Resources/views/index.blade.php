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
<<<<<<< HEAD
                <br>
=======
            <h1>Area</h1>
>>>>>>> elsa
            <a href="{{ route('area.create')}}" class="btn btn-primary btn-sm pull-right" style="margin-button:20px;"><span class="glyphicon glyphicon-plus"> Tambah</span></a>
                <br>
                <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="10">No</th>
                        <th>Nama Area</th>
                        <th colspan="2" style="text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                @if (count($area) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data Area</td>
                        </tr>
                @else
                    @foreach ($area as $key)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$key->area_nama}}</td>
                            <td>
                                <a href="{{ route('area.edit',['id'=>$key->area_id])}}" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('area.destroy',['id'=>$key->area_id])}}" method="POST">
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
            {{ $area->links() }}
        </div>
    </div>
</div>
@stop
