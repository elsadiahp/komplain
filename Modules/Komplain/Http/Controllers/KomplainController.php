<?php

namespace Modules\Komplain\Http\Controllers;

use App\Models\Area;
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


        $data->komplain = Komplain::with(['waroeng', 'komplain_details'])->orderBy('komplain_id', 'asc')->get();

        $data->komplain = Komplain::with(['waroeng', 'komplain_details'])->orderby('komplain_id', 'asc')->paginate(10);

        $data->waroeng = Waroeng::All()->count();
        $data->detail_komplain = KomplainDetail::with(['tb_kategori', 'komplain'])->get();
        $data->kategori = TbKategori::All();


        $data->komplain = Komplain::with(['waroeng', 'komplain_details'])->get();

        $no = 1;


        return view('komplain::index', compact('data', 'no'));

    }

    public function chart(Request $request)
    {

        if ($request->p == 'waroeng_id') {

            $data = DB::select('SELECT
              waroeng.waroeng_id,
              waroeng.waroeng_nama as name,
              area.area_nama,
              COALESCE(v, 0) AS v
            
            FROM area,waroeng
                        LEFT JOIN (
              SELECT waroeng_id, COUNT(*) AS v
              FROM komplain
              GROUP BY waroeng_id
            ) vs ON vs.waroeng_id = waroeng.waroeng_id
            WHERE waroeng.area_id = area.area_id');

            return $data;
        } else if ($request->p == 'area_id') {
            $data = DB::select('SELECT a.area_nama AS name,
       SUM(s)         AS v
FROM area a,
     waroeng w
       LEFT JOIN (
       SELECT waroeng_id, COUNT(*) AS s
       FROM komplain k
       GROUP BY k.waroeng_id
     ) k ON k.waroeng_id = w.waroeng_id
WHERE w.area_id = a.area_id
GROUP BY name');
            return $data;
        }
        return 500;
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */

    public function create()
    {
        $data = new \stdClass();
        $data->komplain = Komplain::all();
        $data->waroeng = Waroeng::all();
        $data->kategori = TbKategori::all();
        $data->detail_komplain = KomplainDetail::all();
        return view('komplain::create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $komplain = new Komplain();


        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        // dd($komplain);
        $komplain->save();


        $tag = $request->id_kategori;
        foreach ($tag as $tags) {
            $detail_komplain = new KomplainDetail();
            $detail_komplain->komplain_id = $komplain->komplain_id;
            $detail_komplain->id_kategori = $tags;
            // dd($detail_komplain);
            $detail_komplain->save();
        }

        Session::flash('success', ' Komplain added successfully');

        $tag = $request->id_kategori;
        foreach ($tag as $tags) {
            $detail_komplain = new KomplainDetail();
            $detail_komplain->komplain_id = $komplain->komplain_id;
            $detail_komplain->id_kategori = $tags;
            // dd($detail_komplain);
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
        $data->detail_komplain = KomplainDetail::where('komplain_id', $id)->get();
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
        if ($request->id_kategori) {
            foreach ($request->id_kategori as $k) {
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
