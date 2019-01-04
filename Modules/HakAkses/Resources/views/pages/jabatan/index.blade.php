@extends('back-end.app')

@section('content')
    <h1>Hak Akses</h1>

    <div class="row ">
        <div class="col-md-12">
            <div class="row items-push">
            @foreach ($data->akses as $akses)
                <div class="col-md-6 col-xl-3"   style="border-color: aliceblue; margin: 8px;">
                    <div class="block block-rounded text-center">
                        <div class="block-content block-content-full block-content-sm bg-body-light">
                            <div class="font-w600 mb-5">{{$akses->display_name}}</div>
                        </div>
                        <div class="block-content block-content-full">
                            <a class="btn btn-square btn-alt-success" href="{{ route('role.permission.view',[$akses->id])}}">
                                <i class="fa fa-eye mr-5"></i>Hak Akses
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
@stop
