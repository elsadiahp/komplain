<?php

namespace Modules\Detkomplain\Http\Controllers;

use App\Kategori;
use App\Models\Komplain;
use App\Models\KomplainDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Redirect;

use App\Models\KomplainDetail;
use Session;


class DetkomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->detkom = KomplainDetail::all();
        $no = 1;
        return view('detkomplain::index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $komplain = Komplain::get();
        $kategori = Kategori::get();
        return view('detkomplain::create', compact('kategori', 'komplain'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $detkom = new KomplainDetail();
        $kat = $request->id_kategori;
        $data[] = $kat;

        $detkom->komplain_id = $request->komplain_id;
        $detkom->komplain_id = $data;

        dump($detkom->komplain_id);
        exit();
        $detkom->save();

        return Redirect::route('detkomplain.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('detkomplain::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('detkomplain::edit');
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
