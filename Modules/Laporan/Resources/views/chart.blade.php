@extends('back-end.app')

@section('content')
    <h1>Laporan</h1>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-body">
             
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
$(function(){
$.ajax({
    url : "/komplain/public/laporan/chart/?m=01",
                    success : function(data) {
                    alert(data)

                        json = jQuery.parseJSON(data);
                    },
                    error : function() {
                        alert("Error");
                    }
})
});
</script>    
@endsection