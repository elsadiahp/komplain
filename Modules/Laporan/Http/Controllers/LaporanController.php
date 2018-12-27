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
        return view('laporan::index');
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

    public function chart_bulan(Request $request)
    {
        $data = new \stdClass();

        $data->bulan = Komplain::select(DB::raw('MONTHNAME(tanggal_komplain) as month, MONTH(tanggal_komplain) as nm'))
                        ->groupBy('nm')
                        ->orderBy('nm','asc')
                        ->get();
        if ($request->input('bulan')) {
            $komplain = Komplain::select('*',DB::raw('MONTHNAME(tanggal_komplain) as month'))
                                ->join('waroeng', 'waroeng.waroeng_id', '=','komplain.waroeng_id')
                                ->join('area','area.area_id','=','waroeng.area_id')
                                ->whereMonth('tanggal_komplain',$request->input('bulan'))
                                ->orderBy('tanggal_komplain', 'asc')
                                ->get();
            $data->chart = Charts::database($komplain, 'bar', 'chartjs')
                        ->elementLabel("Komplain Berdasarkan Bulan")            
                        ->title("Total Komplain Berdasarkan Bulan")
                        ->dimensions(1000, 500)
                        ->responsive(false)
                        ->groupBy('area_nama');
        } else {
            $kondisi = Carbon::now()->format('m');
            $bulan = Carbon::now()->format('F');
            $komplain = Komplain::select('*',DB::raw('MONTH(tanggal_komplain) as month'))
                                ->join('waroeng', 'waroeng.waroeng_id', '=','komplain.waroeng_id')
                                ->join('area','area.area_id','=','waroeng.area_id')
                                ->whereMonth('tanggal_komplain','=',$kondisi)
                                ->orderBy('tanggal_komplain', 'asc')
                                ->get();
            $data->chart = Charts::database($komplain, 'bar', 'chartjs')
                        ->elementLabel("Komplain Berdasarkan Bulan")            
                        ->title("Total Komplain Berdasarkan Bulan")
                        ->dimensions(1000, 500)
                        ->responsive(false)
                        ->groupBy('area_nama');
        }
        return view('laporan::bulan',compact(['data']));
    }

    public function chart_kategori(Request $request)
    {
        $data = new \stdClass();
        $data->kat = DB::table('komplain_detail')
                    ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->join('komplain', 'komplain.komplain_id', '=', 'komplain_detail.komplain_id')
                    ->join('waroeng', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
                    ->join('area','area.area_id','=','waroeng.area_id')
                    ->groupBy('tb_kategori.nama_kategori')
                    ->get(); 

        if ($request->input('kategori')) {
            $kategori = DB::table('komplain_detail')
                    ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->join('komplain', 'komplain.komplain_id', '=', 'komplain_detail.komplain_id')
                    ->join('waroeng', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
                    ->join('area','area.area_id','=','waroeng.area_id')
                    ->where('tb_kategori.id_kategori','=',$request->input('kategori'))
                    ->get(); 
            $data->kategori = Charts::database($kategori,'bar', 'chartjs')
                    ->elementLabel("Komplain Berdasarkan Kategori")
                    ->title('Total Komplain Berdasarkan Kategori')
                    ->dimensions(1000, 500)
                    ->responsive(false)
                    ->groupBy('area_nama');
        } else {
            $kategori = DB::table('komplain_detail')
                    ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->get(); 
            $data->kategori = Charts::database($kategori,'bar', 'chartjs')
                    ->elementLabel("Komplain Berdasarkan Semua Kategori" )
                    ->title('Total Komplain Berdasarkan Kategori')
                    ->dimensions(1000, 500)
                    ->responsive(false)
                    ->groupBy('nama_kategori');
        }
        return view('laporan::kategori',compact(['data']));
    }
}
