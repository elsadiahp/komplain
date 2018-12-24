<?php

namespace Modules\Waroeng\Http\Controllers;

use App\Models\Area;
use App\Waroeng;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Redirect;
use Session;

class WaroengController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $waroeng = Waroeng::with(['area'])->get();
        $no = 1;
        return view('waroeng::index', compact( 'waroeng','no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $waroeng = Waroeng::get();
        $area = Area::get();
        return view('waroeng::create', compact('waroeng', 'area'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $waroeng = new Waroeng();
        $waroeng->waroeng_nama= $request->nama_waroeng;
        $waroeng->waroeng_alamat= $request->alamat_waroeng;
        $waroeng->area_id= $request->area_id;
        $waroeng->save();

        Session::flash('success', $waroeng->waroeng_nama . ' berhasil ditambahkan!');

        return Redirect::route('waroeng.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('waroeng::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $waroeng = Waroeng::find($id);
        $area = Area::get();
        return view('waroeng::edit', compact('waroeng', 'area'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $waroeng = Waroeng::find($id);
        $waroeng->waroeng_nama = $request->nama_waroeng;
        $waroeng->waroeng_alamat = $request->alamat_waroeng;
        $waroeng->area_id = $request->area_id;
        $waroeng->save();

        return Redirect::route('waroeng.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $waroeng = Waroeng::find($id);
        $waroeng->delete();

        Session::flash('delete', $waroeng->waroeng_nama . ' berhasil dihapus!');

        return Redirect::route('waroeng.index');
    }
}
