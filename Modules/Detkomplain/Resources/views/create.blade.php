@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Tambah Detail Komplain <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('save.detkomplain')}}" method="POST" class="form-horizontal col-md-8">
                    @csrf

                    <div class="form-group">
                        <label for="komplain_id"class="col-md-12 control-label"> ID Komplain</label>
                        <div class="col-md-12">
                            <select name="komplain_id" id="komplain_id" class="form-control" required>
                                <option value="">--Pilih ID Komplain--</option>
                                @foreach($komplain as $kom)
                                    <option value="{{$kom->komplain_id}}">{{$kom->komplain_id}}</option>
                                @endforeach
                            </select>
                            {{--<button class="btn btn-success">Add</button>--}}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_kategori" class="col-md-12 control-label">Nama Kategori </label>
                        <div class="col-md-12">
                            <select name="kategori[]" id="kat" class="form-control" required>
                                <option value="">--Pilih Nama Kategori--</option>
                                @foreach($kategori as $kat)
                                    <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                @endforeach
                            </select>
                            {{--<button class="btn btn-success">Add</button>--}}
                        </div>
                    </div>

                    <div class="clone hide">
                        <div class="control-group form-group">
                            <label for="id_kategori" class="col-md-12 control-label">Nama Kategori </label>
                            <div class="col-md-12">
                                <select name="kategori[]" id="kat" class="form-control" required>
                                    <option value="">--Pilih Nama Kategori--</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                                    @endforeach
                                </select>
                                {{--<button class="btn btn-danger">Remove</button>--}}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

                {{--<script type="text/javascript">--}}
                    {{--$(document).ready(function() {--}}

                        {{--$(".btn-success").click(function(){--}}
                            {{--var html = $(".clone").html();--}}
                            {{--$(".increment").after(html);--}}
                        {{--});--}}

                        {{--$("body").on("click",".btn-danger",function(){--}}
                            {{--$(this).parents(".control-group").remove();--}}
                        {{--});--}}

                    {{--});--}}
                {{--</script>--}}
            </div>
        </div>
    </div>
@endsection

