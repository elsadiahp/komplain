<?php

namespace Modules\Komplain\Http\Controllers;

use App\Models\Area;
use App\Models\Bagian;
use App\Models\KategoriDetail;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\TbKategori;
use App\Models\Waroeng;
use App\Models\Komplain;
use App\Models\KomplainDetail;
use Session;
use Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();

        $data->komplain = DB::table('area')
            ->leftJoin('waroeng', 'area.area_id', '=', 'waroeng.area_id')
            ->leftJoin('komplain', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
            ->leftJoin('komplain_detail', 'komplain_detail.komplain_id', '=', 'komplain.komplain_id')
            ->groupBy('area.area_nama')
            ->get();
        $no = 1;

//        $jumlah = count();

        return view('komplain::index', compact('data', 'no'));

    }

    public function create()
    {
        $data = new \stdClass();
        $data->komplain = Komplain::all();
        $data->waroeng = Waroeng::all();
        $data->area = Area::all();
        $data->kategori = DB::table('tb_kategori')->where('id_kategori_parent', '=', null)->get();
        $data->detail_komplain = KomplainDetail::all();
        $data->bagian = Bagian::all();
        $data->sub = DB::table('tb_kategori')->where('id_kategori_parent', '!=', null)->get();

//        $data->detail_kategori = KategoriDetail::all();
        return view('komplain::create', compact('data'));
    }

    public function store(Request $request)
    {
        $komplain = new Komplain();

        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        $komplain->save();


//        menyimpan id_kategori di tabel komplain_detail
        $tag = $request->kategori;
//       dd($tag);
        foreach ($tag as $tags) {
            $detail_komplain = new KomplainDetail();
            $detail_komplain->komplain_id = $komplain->komplain_id;
            $detail_komplain->id_kategori = $tags;
            $detail_komplain->save();
        }

        Session::flash('success', ' Komplain added successfully');
        return Redirect::route('komplain.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $data = new \stdClass();
        $data->area = DB::table('komplain')
            ->join('waroeng', 'waroeng.waroeng_id', 'komplain.waroeng_id')
            ->join('area', 'area.area_id', 'waroeng.area_id')
            ->where('waroeng.area_id', '=', $id)
//            ->groupBy('area.area_id')
            ->get();

        $no = 1;

        return view('komplain::show', compact('data', 'no'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data = new \stdClass();
        $data->komplain = Komplain::find($id);
        $data->kategori = TbKategori::all();
        $id_waroeng = $data->komplain->waroeng_id;
        $data->waroeng = Waroeng::with('area')->where('waroeng_id',$id_waroeng)->first();
        $data->area = Area::all();
//        $data->detail_kategori = KategoriDetail::all();
//        $data->detail_komplain = KomplainDetail::all();
        $data->detail_komplain = KomplainDetail::where('komplain_id', $id)->get();
        $data->sub = DB::table('tb_kategori')->where('id_kategori_parent', '!=', null)->get();


        return view('komplain::edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $komplain = Komplain::find($id);

        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        $komplain->save();
        KomplainDetail::where([
            ['komplain_id', $id]
        ])->delete();
        if ($request->kategori_detail_id) {
            foreach ($request->kategori_detail_id as $k) {
                $detail = KomplainDetail::where([
                    ['komplain_id', $id],
                    ['id_kategori', $k]
                ])->get();

                if ($detail) {
                    $d = new KomplainDetail;
                    $d->id_kategori = $k;
                    $d->komplain_id = $id;
                    $d->save();
                }
            }
        }

        return redirect()->route('komplain.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $detail = KomplainDetail::where('komplain_id', $id);
        if ($detail->delete()) {
            $komplain = Komplain::find($id);
            $komplain->delete();
        }
        return redirect()->route('komplain.index');
    }
    public function waroeng(Request $request)
    {
        return Waroeng::where('area_id',  $request->id)->get();
    }

}
