<?php

namespace Modules\Laporan\Http\Controllers;

use App\Kategori;
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
        return view('laporan::index', compact('data'));

    }

    public function area(Request $request)
    {
        $data = new \stdClass();

        $data->are = Area::get();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori', 'komplain'])->get();
        $data->kategori = TbKategori::All();
        $data->a = $request->get('area_id');
        $tampil = DB::table('area')->where('area_id', '=', $data->a)->first();
        $no=1;

        $area = DB::table('komplain')->join('waroeng', 'komplain.waroeng_id', '=', 'waroeng.waroeng_id')
            ->join('area', 'waroeng.area_id', '=', 'area.area_id')
            ->where('area.area_id', $data->a )
            ->get();
        $data->area = Charts::database($area, 'bar', 'highcharts')
            ->elementLabel("Komplain Berdasarkan Waroeng ")
            ->title('Total Komplain Berdasarkan Waroeng')
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('waroeng_nama');

        return view('laporan::area', compact(['data','area','no','tampil']));
    }


    public function kategori(Request $request)
    {
        
        $data = new \stdClass();

        $data->kat = TbKategori::get();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori', 'komplain'])->get();
        $data->k = $request->get('kategori');
        $kateg = DB::table('tb_kategori')->where('id_kategori', '=', $data->k)->first();
        $no=1;

        $kategori = DB::table('tb_kategori')->join('komplain_detail', 'komplain_detail.id_kategori', '=', 'tb_kategori.id_kategori')
            ->join('komplain', 'komplain_detail.komplain_id', '=', 'komplain.komplain_id')
            ->join('waroeng', 'komplain.waroeng_id', '=', 'waroeng.waroeng_id')
            ->join('area', 'waroeng.area_id', '=', 'area.area_id')
            ->where('tb_kategori.id_kategori', 'like', '%%' . $data->k . '%%')->get();
        $data->kategori = Charts::database($kategori, 'bar', 'highcharts')
            ->elementLabel("Komplain Kategori Berdasarkan Area ")
            ->title('Total Komplain Kategori Berdasarkan Area')
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('area_nama');

        return view('laporan::kat', compact('data', 'kategori','no','kateg'));
    }
    
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
        $no = 1;
        $data = new \stdClass();

        $data->bulan = Komplain::select(DB::raw('MONTHNAME(tanggal_komplain) as month, MONTH(tanggal_komplain) as nm'))
            ->groupBy('nm')
            ->orderBy('nm', 'asc')
            ->get();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori', 'komplain'])->get();
        $data->kategori = TbKategori::All();

        

        if ($request->input('bulan')) {
            $monthNum = $request->input('bulan');
            $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

            $komplain = Komplain::select('*',DB::raw('MONTHNAME(tanggal_komplain) as month'))
                                ->join('waroeng', 'waroeng.waroeng_id', '=','komplain.waroeng_id')
                                ->join('area','area.area_id','=','waroeng.area_id')
                                ->whereMonth('tanggal_komplain',$request->input('bulan'))
                                ->orderBy('tanggal_komplain', 'asc')
                                ->get();
        } else {
            $kondisi = Carbon::now()->format('m');
            $monthName = Carbon::now()->format('F');
            $komplain = Komplain::select('*',DB::raw('MONTH(tanggal_komplain) as month'))
                                ->join('waroeng', 'waroeng.waroeng_id', '=','komplain.waroeng_id')
                                ->join('area','area.area_id','=','waroeng.area_id')
                                ->whereMonth('tanggal_komplain','=',$kondisi)
                                ->orderBy('tanggal_komplain', 'asc')
                                ->get();
        }
            $data->chart = Charts::database($komplain, 'bar', 'highcharts')
                            ->elementLabel("Komplain Berdasarkan Bulan " . $monthName)            
                            ->title("Total Komplain Berdasarkan Bulan " . $monthName)
                            ->dimensions(1000, 500)
                            ->responsive(true)
                            ->groupBy('area_nama');
        return view('laporan::bulan',compact(['data','komplain','no','monthName']));
    }

    public function chart_kategori(Request $request)
    {
        $no=1;
        $data = new \stdClass();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori', 'komplain'])->get();
        $kategori = TbKategori::get();
        $data->kat = DB::table('komplain_detail')
                    ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->join('komplain', 'komplain.komplain_id', '=', 'komplain_detail.komplain_id')
                    ->join('waroeng', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
                    ->join('area','area.area_id','=','waroeng.area_id')
                    ->groupBy('tb_kategori.nama_kategori')
                    ->get(); 

        if ($request->input('kategori')) {
            $komplain = DB::table('komplain_detail')
                    ->join('tb_kategori', 'tb_kategori.id_kategori', '=', 'komplain_detail.id_kategori')
                    ->join('komplain', 'komplain.komplain_id', '=', 'komplain_detail.komplain_id')
                    ->join('waroeng', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
                    ->join('area','area.area_id','=','waroeng.area_id')
                    ->where('tb_kategori.id_kategori','=',$request->input('kategori'))
                    ->get(); 
           
        } else {
            $komplain = $data->kat;    
        }
            $data->komplain = Charts::database($komplain,'bar', 'highcharts')
            ->elementLabel("Komplain Berdasarkan Kategori")
            ->title('Total Komplain Berdasarkan Kategori')
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('area_nama');
                
        return view('laporan::kategori',compact(['data','komplain','no']));
    }
}
