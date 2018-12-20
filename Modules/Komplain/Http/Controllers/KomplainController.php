<?php

namespace Modules\Komplain\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\TbKategori;
use App\Models\Waroeng;
use App\Models\Komplain;
use Session;
use Carbon\Carbon;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->komplain = Komplain::with(['tb_kategori','waroeng'])->get();
        $no=1;
        return view('komplain::index', compact(['data','no']));
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
        return view('komplain::create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $komplain = new Komplain;

        $komplain->id_kategori = $request->id_kategori;
        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_komplain;
        $komplain->isi_komplain = $request->isi_komplain;
        $komplain->tanggal_komplain = $request->tanggal_komplain;
        $komplain->waktu_komplain = $request->waktu_komplain;
        
        // dd([$request->tanggal_komplain, $request->waktu_komplain]);

        // $tanggal = str_replace("-", "", $request->tanggal_komplain);
        // $waktu = str_replace(":", "", $request->waktu_komplain);
        // $komplain->tanggal_komplain = Carbon::parse($tanggal)->format('Y-m-d');
        // $komplain->waktu_komplain = Carbon::parse($waktu)->format('H:m:s');

        dd($request->waktu_komplain);
        $komplain->save();

        Session::flash('success',' Komplain added successfully');
        return redirect()->route('komplain.index');
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

        $komplain->id_kategori = $request->id_kategori;
        $komplain->waroeng_id = $request->waroeng_id;
        $komplain->media_koplain = $request->media_koplain;
		$komplain->isi_komplain = $request->isi_komplain;
		$komplain->tanggal_jam_komplain = $request->tanggal_jam_komplain;
        $komplain->save();

        return redirect()->route('komplain.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
        $komplain = Komplain::find($id);
        $komplain->delete();
        return redirect()->route('komplain.index');
    }
}
