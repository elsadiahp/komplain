<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $data = User::with('roles')->orderBy('id','DESC')->paginate(5);

        return view('user::user_index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('user::user_create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request, [
        //     'name' => 'required',
        //     'username' => 'required|unique:users,username',
        //     'users_waroeng_id',
        //     'email' => 'required|email',
        //     'password' => 'required|same:confirm-password',
        //     'roles' => 'required',
        // ]);
        // $user = new User();

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
            
        $user = User::create($input);

        $user_id = $user->id;

        $user->roles()->sync($request->roles, $user_id);

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {

        return view('user::user_show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::get();
        $userRole = RoleUser::where('user_id',$id)->first(); 

        return view('user::user_edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'username' => 'required|unique:users,username',
        //     'users_area_id' => 'required',
        //     'users_waroeng_id',
        //     'email' => 'required|email',
        //     'password' => 'same:confirm-password',
        //     'roles' => 'required'
        // ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }


        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        $user_id = $user->id;

        $user->roles()->sync($request->roles, $user_id);


        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
