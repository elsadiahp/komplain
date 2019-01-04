<?php

namespace Modules\Roles\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\PermissionRole;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles::index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('roles::create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $role = new Role();

        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        $role_id = $role->id;

        $role->permissions()->sync($request->permission, $role_id);

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")
            ->where("permission_role.role_id",$id)
            ->get();

        return view('roles::show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        
        $role = Role::find($id);
        $permission = Permission::get();
        // return $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)
        //     ->pluck('permission_role.permission_id','permission_role.permission_id');
        // $rolePermissions = PermissionRole::pluck('permission_id','role_id');
        $rolePermissions = $role->permissions()->pluck('permission_id','role_id')->toArray();


        return view('roles::edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();


        DB::table("permission_role")->where("permission_role.role_id",$id)
                                    ->delete();


        foreach ($request->input('permission') as $key) {
                    $role->attachPermission($key);
        }


        return redirect()->route('roles.index')
                         ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
