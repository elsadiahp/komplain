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
use App\Charts\Bulan;
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

        $komplain = Komplain::select('*',DB::raw('MONTHNAME(tanggal_komplain) as month'))->orderBy('tanggal_komplain', 'asc')->get();
        $data->chart = Charts::database($komplain, 'bar', 'highcharts')
                    ->elementLabel("Komplain Berdasarkan Bulan")            
                    ->title("Total Komplain Berdasarkan Bulan")
                    ->dimensions(1000, 500)
                    ->responsive(false)
                    ->groupBy('month');

        $kategori = DB::table('komplain_detail')->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->get(); 
        $data->kategori = Charts::database($kategori,'bar', 'highcharts')
                  ->elementLabel("Komplain Berdasarkan Kategori")
                  ->title('Total Komplain Berdasarkan Kategori')
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('nama_kategori');

        $area = DB::table('komplain')->join('waroeng', 'komplain.waroeng_id', '=', 'waroeng.waroeng_id')
                                        ->join('area', 'area.area_id','=','waroeng.area_id')
                                        ->get();
        $data->area = Charts::database($area,'bar', 'highcharts')
                  ->elementLabel("Komplain Berdasarkan Area")
                  ->title('Total Komplain Berdasarkan Area')
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('area_nama');

        $waroeng = DB::table('komplain')->join('waroeng','komplain.waroeng_id','=','waroeng.waroeng_id')
                                        ->get();
        $data->waroeng = Charts::database($waroeng,'bar', 'highcharts')
                  ->elementLabel("Komplain Berdasarkan Waroeng")
                  ->title('Total Komplain Berdasarkan Waroeng')
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('waroeng_nama');

        return view('laporan::index',compact('data'));
    }
    public function chart(Request $request){

        $area = DB::table('komplain')->join('waroeng', 'komplain.waroeng_id', '=', 'waroeng.waroeng_id')
                                        ->join('area', 'area.area_id','=','waroeng.area_id')
                                        ->join('komplain_detail','komplain_detail.komplain_id','=','komplain.komplain_id')
                                        ->join('tb_kategori','komplain_detail.id_kategori','tb_kategori.id_kategori');
                                        
        if ($request->m) {
            $area->where('komplain.tanggal_komplain', 'like','2018-'.$request->m.'-%%');
        }
        if ($request->k) {
            $area->where('komplain_detail.id_kategori', '=', $request->k);
        }
        if ($request->a) {
            $area->where('area.area_id', '=', $request->a);
        }
        return $area->get();
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
    
    
}
