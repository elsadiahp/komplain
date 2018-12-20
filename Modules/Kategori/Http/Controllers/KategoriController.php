<?php

namespace Modules\Kategori\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Kategori;
use Redirect;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $kat = new \stdClass();
        $kat->kat = Kategori::all();
        $no = 1;
        return view('kategori::index', compact('kat', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('kategori::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $kat = new Kategori();
        $kat->nama_kategori = $request->kat;
        $kat->save();

        return Redirect::route('kategori.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('kategori::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori::edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->kat;
        $kategori->save();

        return Redirect::route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return Redirect::route('kategori.index');
    }
}
