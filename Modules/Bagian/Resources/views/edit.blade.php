@extends('back-end.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('update.bagian', $bagian->bagian_id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group {{$errors->has('bagian_nama') ? 'has-error': ''}}">
                        <label for="bagian_nama">Kategori Bagian : </label>
                        <input type="text" class="form-control" name="bagian_nama" value="{{$bagian->bagian_nama}}"/>
                        <span class="help-block">
                        @if ($errors->has('bagian_nama'))
                                {{$errors->first('bagian_nama')}}
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
