<?php

namespace Modules\Komplain\Http\Controllers;

use App\Models\Area;
use App\Models\Bagian;
use App\Models\KategoriDetail;
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
        $data->detail_komplain = KomplainDetail::with(['komplain', 'tb_kategori', ])->get();
        $data->kat =DB::table('tb_kategori')->where('id_kategori_parent', '=', null)->get();
        $data->kategori = TbKategori::all();
//        $data->sub = DB::table('tb_kategori')->where('id_kategori_parent', '!=', null)->get();
        $data->bagian = Bagian::all();

        $data->komplain = DB::table('komplain')
            ->join('waroeng', 'waroeng.waroeng_id', '=', 'komplain.waroeng_id')
            ->join('komplain_detail', 'komplain.komplain_id', '=', 'komplain_detail.komplain_id')
//            ->join('kategori_detail', 'kategori_detail.kategori_detail_id', '=', 'komplain_detail.kategori_detail_id')
            ->groupBy('komplain.komplain_id')
            ->get();
        $no = 1;

        return view('komplain::index', compact('data', 'no'));

    }

    public function create()
    {
        $data = new \stdClass();
        $data->komplain = Komplain::all();
        $data->waroeng = Waroeng::all();
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
    public function show()
    {
        return view('komplain::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $data = new \stdClass();
        $data->komplain = Komplain::find($id);
        $data->waroeng = Waroeng::all();
        $data->kategori = TbKategori::all();
//        $data->detail_kategori = KategoriDetail::all();
        $data->detail_komplain = KomplainDetail::all();
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

}
