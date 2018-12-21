@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <h4>Edit Waroeng <br></h4>
            </div>

            <div class="panel-body">
                <form action="{{route('update.waroeng', $waroeng->waroeng_id)}}" method="POST" class="form-horizontal col-md-8">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_waroeng" class="col-md-12 control-label">Nama Waroeng</label>
                        <div class="col-md-12">
                            <input type="text" id="nama_waroeng" name="nama_waroeng" class="form-control" value="{{$waroeng->waroeng_nama}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat_waroeng" class="col-md-12 control-label">Alamat Waroeng</label>
                        <div class="col-md-12">
                            <input type="text" id="alamat_waroeng" name="alamat_waroeng" class="form-control" value="{{$waroeng->waroeng_alamat}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="area_id" class="col-md-12 control-label">Nama Area</label>
                        <div class="col-md-12">
                            <select name="area_id" id="area_id" class="form-control" required>
                                <option value="">--Pilih Nama Area--</option>
                                @foreach($area as $area)
                                    @if($area->area_id === $waroeng->area_id)
                                        <option value="{{$area->area_id}}"{{$waroeng->area_id==$area->area_id?'selected':''}}>{{$area->area_nama}}</option>
                                        @else
                                        <option value="{{$area->area_id}}">{{$area->area_nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

