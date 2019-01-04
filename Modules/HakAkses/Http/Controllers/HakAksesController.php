<?php

namespace Modules\HakAkses\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Role;

class HakAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = new \stdClass();
        $data->akses = Role::all();
        $no = 1;
        return view('hakakses::pages.jabatan.index', compact('data','no'));
    }

    public function ViewRoleWithPermission($idRole)
    {
        $data = Role::findOrFail($idRole);
        return view('hakakses::pages.jabatan.create', compact('data'));
    }
    
    public function SaveRoleWithPermission(Request $request, $idRole)
    {
        $Permission = DB::table('permission_role');
        $Permission->leftJoin('permissions','permissions.id','=','permission_role.permission_id')
                    ->where('role_id','=','idRole')
                    ->delete();
        foreach ($request->all as $key => $part) {
            $Permission->insert([
                ['permission_id' => $key, 'role_id'=>$idRole]
            ]);
        }
        return back()->with('result',$idPermission);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hakakses::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        $data = new \stdClass();
        $data->akses = Role::all();
        $no = 1;
        return view('hakakses::show', compact('data', 'no'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('hakakses::edit');
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
