<?php

namespace Modules\Laporan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Komplain;
use App\Models\Waroeng;
use App\Models\KomplainDetail;
use App\Models\TbKategori;
use App\Models\Area;
use Charts;
use DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();

        return $komplain = Komplain::where(DB::raw("(DATE_FORMAT(tanggal_komplain,'%m'))"),date('m'))->get();
        

        $data->chart = Charts::database($komplain, 'bar', 'highcharts')
			      ->title("komplain detail")
			      ->elementLabel("Total komplain")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);

        return view('laporan::index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('laporan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('laporan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('laporan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
    public function chart()
    {
        return view('laporan::index');
    }
    
}
