@php
    $host =  $_SERVER['HTTP_HOST'];
    $file = 'http://'.$host.':3000/browser-sync/browser-sync-client.js?v=2.26.3';
    $file_headers = @get_headers($file);

    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found')
    {

    }
    else
    {
    echo '<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='.$file.'><\/script>");
    //]]></script>';
    }
@endphp

<script src="{{asset('back-end/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="{{asset('back-end/vendors/popper.js/js/popper.min.js')}}"></script>
<script src="{{asset('back-end/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('back-end/vendors/pace-progress/js/pace.min.js')}}"></script>
<script src="{{asset('back-end/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('back-end/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{asset('back-end/vendors/chart.js/js/Chart.min.js')}}"></script>
<script src="{{asset('back-end/vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
