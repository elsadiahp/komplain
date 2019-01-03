<?php

namespace Modules\Kategori\Http\Controllers;

use App\Models\Bagian;
use App\Models\TbKategori;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $kat = new \stdClass();
        $kat->kat = DB::table('tb_kategori as k')->join('bagian as b', 'b.bagian_id', '=', 'k.bagian_id')->get();
        $kat->sub = DB::table('tb_kategori')->where('id_kategori_parent', '!=', null)->get();
        $no = 1;
        return view('kategori::index', compact('kat', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $kat = TbKategori::all();
        $bagian = Bagian::all();
        return view('kategori::create', compact('kat', 'bagian'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $kat = new TbKategori();
        $kat->nama_kategori = $request->kat;
        $kat->id_kategori_parent = $request->parent_kat;
        $kat->bagian_id = $request->bagian;
        $kat->save();

        Session::flash('success', $kat->nama_kategori . ' berhasil ditambahkan!');

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
       $kat = TbKategori::with('tb_kategori')
            ->where('id_kategori', $id)
            ->first();
        $kategori = TbKategori::join('bagian as b', 'b.bagian_id', '=', 'tb_kategori.bagian_id')->get();
        $bagian = Bagian::all();
        $sub = DB::table('tb_kategori')->where('id_kategori_parent', '!=', null)->get();

        return view('kategori::edit', compact('kat', 'kategori', 'bagian', 'sub'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {

        $kategori = TbKategori::find($id);
        $kategori->bagian_id= $request->bagian;
        $kategori->id_kategori_parent = $request->parent_kat;
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
        $kategori = TbKategori::find($id);
        $kategori->delete();

        Session::flash('delete', $kategori->nama_kategori . ' berhasil dihapus!');

        return Redirect::route('kategori.index');
    }
}
