<?php

namespace Modules\Laporan\Http\Controllers;

//use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Charts;
use App\Models\Komplain;
use App\Models\Waroeng;
use App\Models\KomplainDetail;
use App\Models\TbKategori;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $chart = Charts::multi('bar', 'material')
            ->title("My Cool Chart")
            ->dimensions(0, 400)
            ->template("material")
            ->dataset('Element 1' , [5, 20, 100])
            ->dataset('Element 2' , [51, 30, 80])
            ->dataset('Element 3' , [25, 10, 40])
            ->labels(['One', 'Two', 'Three']);
//        $komplain = Komplain::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
//    				->get();
//        $chart = Charts::database($komplain, 'bar', 'highcharts')
//			      ->title("Monthly new Register Users")
//			      ->elementLabel("Total Users")
//			      ->dimensions(1000, 500)
//			      ->responsive(false)
//			      ->groupByMonth(date('Y'), true);
        return view('laporan::index', ['chart' => $chart]);
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
