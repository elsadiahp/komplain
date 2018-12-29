<?php

namespace Modules\KategoriDetail\Http\Controllers;

use App\Kategori;
use App\Models\KategoriDetail;
use App\Models\TbKategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class KategoriDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->detkategori = KategoriDetail::with('tb_kategori')->get();
        $no = 1;
        return view('kategoridetail::index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data = new \stdClass();
        $data->kat = TbKategori::get();
        return view('kategoridetail::create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $dkategori = new KategoriDetail();
        $dkategori->kategori_detail_nama= $request->nama_dkat;
        $dkategori->id_kategori= $request->id_kategori;
        $dkategori->save();

        Session::flash('success', $dkategori->kategori_detail_nama . ' berhasil ditambahkan!');

        return Redirect::route('dkategori.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('kategoridetail::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $detkategori = KategoriDetail::find($id);
        $kategori = TbKategori::get();

        return view('kategoridetail::edit', compact('detkategori', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $detkategori = KategoriDetail::find($id);
        $detkategori->id_kategori = $request->id_kategori;
        $detkategori->kategori_detail_nama = $request->nama_dkat;
        $detkategori->save();

        return Redirect::route('dkategori.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $detkategori = KategoriDetail::find($id);
        $detkategori->delete();

        Session::flash('delete', $detkategori->kategori_detail_nama . ' berhasil dihapus!');

        return Redirect::route('dkategori.index');
    }
}
