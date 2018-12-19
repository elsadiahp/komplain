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
            
            ini content
        </div>
    </div>
</div>
@stop
