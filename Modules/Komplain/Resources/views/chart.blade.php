@extends('back-end.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="pieChart"></div>
            </div>
        </div>
    </div>
 @stop


@section('js')
    <script src="//d3js.org/d3.v3.min.js"  charset="utf-8"></script>

    <script src="/js/d3pie.min.js"></script>

    <script>
        var pie = new d3pie("pieChart", {

            "data": {

                "content": [

                    {"label":"Master Course","value":2807},

                    {"label":"Affiliates", "value":1072},

                    {"label":"Ebook", "value": 972}

                ]

            }});
    </script>
@endsection
