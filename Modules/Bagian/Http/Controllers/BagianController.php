<?php

namespace Modules\Bagian\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BagianController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->bagian = Bagian::all();
        $no = 1;
        return view('bagian::index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('bagian::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $bagian = new Bagian();
        $bagian->bagian_nama = $request->bagian_nama;
        $bagian->save();

        Session::flash('success', $bagian->bagian_nama . ' berhasil ditambahkan!');

        return Redirect::route('bagian.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('bagian::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $bagian  = Bagian::find($id);
        return view('bagian::edit', compact('bagian'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $bagian = Bagian::find($id);

        $bagian->bagian_nama = $request->bagian_nama;
        $bagian->save();

        return Redirect::route('bagian.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $bagian = Bagian::find($id);
        $bagian->delete();

        Session::flash('delete', $bagian->bagian_nama . ' berhasil dihapus!');


        return Redirect::route('bagian.index');
    }
}
