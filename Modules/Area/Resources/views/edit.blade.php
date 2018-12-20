@extends('back-end.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('area.update',$area->area_id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group {{$errors->has('area_nama') ? 'has-error': ''}}">
                <label for="area_nama">Area : </label>
                <input type="text" class="form-control" name="area_nama" value="{{$area->area_nama}}"/>
                    <span class="help-block">
                        @if ($errors->has('area_nama'))
                            {{$errors->first('area_nama')}}
                        @endif
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop