@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.update', $data->komplain->komplain_id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="waroeng_id">Area</label>
                    <select class="selection form-control area" id="area" name="area" value="{{$data->waroeng->area_id}}">
                        <option value="0" disable="true" selected="true">-Pilih Area-</option>
                            @foreach ($data->area as $key)
                            @if ($key->area_id === $data->waroeng->area_id)
                                <option selected value="{{$key->area_id}}">{{$key->area_nama}}</option>
                            @else
                            <option value="{{$key->area_id}}">{{$key->area_nama}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Waroeng</label>
                        <select class="selection form-control" name="waroeng_id" id="waroeng">
                            <option value="0" disable="true" selected="true">-Pilih Nama Waroeng-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Nama Kategori </label>
                        <select id="kategori" name="id_kategori[]" class="form-control detail select2 " multiple="multiple">
                            @foreach ($data->kategori as $kategori)
                                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" name="media_komplain" value="{{$data->komplain->media_koplain}}">
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10" class="form-control">{{$data->komplain->isi_komplain}}</textarea>
                    </div>
                    <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                            <option value="{{$data->komplain->status}}" selected>{{$data->komplain->status}}</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Butuh Tindak Lanjut">Butuh Tindak Lanjut</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">{{$data->komplain->keterangan}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_komplain">Tanggal Komplain</label>
                        <input class="form-control" name="tanggal_komplain" type="date" value="{{$data->komplain->tanggal_komplain}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Waktu Komplain</label>
                        <input class="form-control" name="waktu_komplain" type="time" value="{{$data->komplain->waktu_komplain}}">
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function coba(id){
        alert(id);
    }
    $(document).ready(function(){
        var area_id = $("#area").val();
            $.get("{{route('komplain.select')}}?id=" + area_id,function(data) {
                $('#waroeng').empty();
                $('#waroeng').append('<option value="0" disable="true" selected="true">-Pilih Nama Waroeng-</option>');

                $.each(data, function(index, waroengObj){
                $('#waroeng').append('<option value="'+ waroengObj.waroeng_id +'">'+ waroengObj.waroeng_nama +'</option>');
                });
                
            })
            .then(function(){
            $('#waroeng').val(['{{$data->waroeng->waroeng_id}}']).trigger('change');
            });
        $('#kategori').select2();
        $('#kategori').val([
            
            
            @foreach($data->detail_komplain as $d)
            {{$d->id_kategori}},
            @endforeach
            ]).trigger('change');
            
        $(document).on('change','.area', function(e){
            var area_id = $(this).val();
            console.log(e);
            var area_id = e.target.value;
           console.log(area_id);
            $.get("{{route('komplain.select')}}?id=" + area_id,function(data) {
                
                console.log(data);
               
                $('#waroeng').empty();
                $('#waroeng').append('<option value="0" disable="true" selected="true">-Pilih Nama Waroeng-</option>');

                $.each(data, function(index, waroengObj){
                $('#waroeng').append('<option value="'+ waroengObj.waroeng_id +'">'+ waroengObj.waroeng_nama +'</option>');
                });
            });

        });
    });
</script>
@endsection
