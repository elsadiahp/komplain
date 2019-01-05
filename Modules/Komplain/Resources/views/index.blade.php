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
                <br>
                <a href="{{ route('komplain.create')}}" class="btn btn-primary btn-sm pull-left marginBottom20px"><span
                        class="glyphicon glyphicon-plus"> Tambah Komplain</span></a>
                <br>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama Area</th>
                        <th colspan="12">Bulan</th>
                        <th rowspan="2">Tahun</th>
                        <th rowspan="2">Total</th>
                        <th rowspan="2">Action</th>
                    </tr>
                    <tr>
                            @for ($i = 1 ; $i <= 12; $i++)
                                <th>
                                {{date('M', mktime(0,0,0,$i,1))}}
                                </th>
                            @endfor
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($data->komplain)==0)
                        <tr>
                            <td colspan="10" class="text-center">Tidak Ada Data</td>
                        </tr>
                    @else
                        @foreach ($data->komplain as $key)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$key->area_nama}}</td>
                                @for ($i = 1 ; $i <= 12; $i++)
                                    @if(\Carbon\Carbon::parse($key->tanggal_komplain)->format('M') === date('M', mktime(0,0,0,$i,1,1)) && \Carbon\Carbon::parse($key->tanggal_komplain)->format('Y') === date('Y', mktime(0,0,0,$i,1,1)) )

                                        <td>{{\Carbon\Carbon::parse($key->tanggal_komplain)->format('M')}}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                @endfor
                                <td></td>
                                <td></td>
                                <td>
                                    @if($key->area_id)
                                        <a href="{{ route('komplain.show', $key->area_id)}}" class="btn btn-success">Show</a>
                                    @else
                                        -
                                    @endif
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

