@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('komplain.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="waroeng_id">Area</label>
                        <select class="selection form-control area" id="area" name="area">
                        <option value="0" disable="true" selected="true">-Pilih Area-</option>
                            @foreach ($data->area as $key)
                            <option value="{{$key->area_id}}">{{$key->area_nama}}</option>
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
                            <option value="">--Pilih Nama Kategori--</option>
                            @foreach($data->kategori as $kat)
                                <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="media_komplain">Media Komplain</label>
                        <input type="text" class="form-control" id="media_komplain" name="media_komplain">
                    </div>
                    <div class="form-group">
                        <label for="isi_komplain">Isi Komplain</label>
                        <textarea name="isi_komplain" id="isi_komplain" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_komplain">Tanggal Komplain</label>
                        <input class="form-control" name="tanggal_komplain" type="date" value="{{date('m/d/Y')}}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_jam_komplain">Waktu Komplain</label>
                        <input class="form-control" name="waktu_komplain" type="time" value="{{date('H:i')}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
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
        $('#kategori').select2();
        $(document).on('change','.area', function(e){
            

            var area_id = $(this).val();
            console.log(e);
            var area_id = e.target.value;
           
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