<?php

namespace Modules\Area\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Area;
use Session;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $area = Area::paginate(10);;
        $no = 1;
        return view('area::index', compact(['area','no']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('area::create', compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $area = new Area;

        $area->area_nama = $request->area_nama;
        // dd($area);
        $area->save();

        Session::flash('success', $area->area_nama . ' berhasil ditambahkan!');

        return redirect()->route('area.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('area::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('area::edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $area = Area::find($id);

        $area->area_nama = $request->area_nama;
        $area->save();

        return redirect()->route('area.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect()->route('area.index');
    }
}
