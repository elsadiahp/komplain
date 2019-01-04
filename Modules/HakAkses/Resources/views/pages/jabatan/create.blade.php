@extends('back-end.app')

@section('content')
    <h1>Hak Akses</h1>

    <div class="row ">
        <div class="col-md-6 col-xl-12">
            <form action="{{ route('role.permission.save',[$data->id])}}" method="post">
                <a href="javascript:void(0)" class="block block-link-pop block-bordered text-center">
                    <div class="block-content">
                        <table class="table table-striped">
                            @foreach ($data as $itemPermission)
                                <tr>
                                    <td>
                                        <label for="" class="css control css-control-sm css-control-primary css-switch css-switch-square">
                                            <input type="checkbox" class="css-control-input" name="{{$itemPermission->id}}">
                                            {{$data->hasPermission($itemPermission->name)? "checked" : null}}
                                            <span class="css-control-indicator"></span>
                                        </label>
                                    </td>
                                    <td align="left">
                                        {{-- {{ucfirst($itemPerission->display_name)}} --}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="block-content block-content-full">
                        <button class="btn btn-hero btn-sm square btn-noborder btn-primary" type="submit">
                            <i class="fa fa-arrow-up mr-5"></i>Simpan
                        </button>
                    </div>
                </a>
            </form>
        </div>
    </div>
@stop
