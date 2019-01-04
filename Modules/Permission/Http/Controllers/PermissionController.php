<?php

namespace Modules\Permission\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->index = Permission::all();
        $no = 1;

        return view('permission::index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('permission::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display;
        $permission->description = $request->des;
        $permission->save();

        Session::flash('success', $permission->display_name. ' berhasil ditambahkan!');

        return Redirect::route('permission.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('permission::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('permission::edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display;
        $permission->description = $request->des;
        $permission->save();

        return Redirect::route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();

        Session::flash('delete', $permission->display_name . 'berhasil dihapus!');

        return Redirect::route('permission.index');
    }
}
