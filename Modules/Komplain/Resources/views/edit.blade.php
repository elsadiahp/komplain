@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.update', $data->komplain->komplain_id)}}" method="post">
                    @csrf

                    {{-- <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="selection form-control" name="id_kategori">
                            <option value="">-</option>
                        @foreach ($data->kategori as $key)
                            @if ($key->id_kategori === $data->komplain->id_kategori)
                                <option selected value="{{$key->id_kategori}}">{{$key->nama_kategori}}</option>
                            @else
                                <option value="{{$key->id_kategori}}">{{$key->nama_kategori}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div> --}}


                    {{--<div class="form-group">--}}
                    {{--<label for="id_kategori">Nama Kategori </label>--}}
                    {{--<select id="kategori" name="id_kategori[]" class="form-control detail" multiple="multiple">--}}
                    {{--@foreach ($data->detail_komplain as $detail_komplain)--}}
                    {{--@if($detail_komplain->komplian_id === $data->komplain->komplain_id)--}}
                    {{--@foreach()--}}
                    {{--<option selected value="{{$detail_komplain->detail_komplain_id}}">{{$detail_komplain->detail_komplain_id}}</option>--}}
                    {{--@else--}}
                    {{--<option value="{{$detail_komplain->detail_komplain_id}}">{{$detail_komplain->detail_komplain_id}}</option>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--</div>--}}

                    <div class="form-group">
                        <label for="kategori_detail_id">Nama Kategori </label>
                        <select id="kategori_detail_id" name="kategori_detail_id[]" class="form-control detail"
                                multiple="multiple">
                            @foreach ($data->detail_komplain as $detail_komplain)
                                @if ($detail_komplain->komplain_id === $data->komplain->komplain_id)
                                    @foreach($data->kategori as $kategori)
                                        @if($kategori->id_kategori === $detail_komplain->id_kategori)
                                                <option selected
                                                        value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                        @else
                                            @if($kategori->id_kategori_parent !== null)
                                                <option
                                                    value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                                            @endif


                                        @endif
                                    @endforeach
                                        @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="waroeng_id">Waroeng</label>
                        <select class="selection form-control" name="waroeng_id">
                            <option value="">-</option>
                            @foreach ($data->waroeng as $key)
                                @if ($key->waroeng_id === $data->komplain->waroeng_id)
                                    <option selected value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                                @else
                                    <option value="{{$key->waroeng_id}}">{{$key->waroeng_nama}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" name="media_komplain"
                               value="{{$data->komplain->media_koplain}}">
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10"
                                  class="form-control">{{$data->komplain->isi_komplain}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_komplain">Tanggal Komplain</label>
                        <input class="form-control" name="tanggal_komplain" type="date"
                               value="{{$data->komplain->tanggal_komplain}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Waktu Komplain</label>
                        <input class="form-control" name="waktu_komplain" type="time"
                               value="{{$data->komplain->waktu_komplain}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('#kategori').val([


                @foreach($data->detail_komplain as $d)
                {{$d->id_kategori}},
                @endforeach
            ]).trigger('change');
        });
    </script>
@endsection
