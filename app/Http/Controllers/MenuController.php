<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ActivityMenu;
use App\Models\MenuToRole;
use App\Models\MenuToUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['menus'] =  Menu::with(['actions', 'roleActions'])->get();
        $data['roles'] =  Role::get();

        return view('permissions.role_access', $data);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MenuToRole::where('role_id',  $request->role_id)->delete();

        $newInsert = [];
        $userUpdate = [];

        if(isset($request->exit)){
            $users = User::where('role_id', $request->role_id)->get('id');

            foreach($users as $user){

                foreach($request->menu_id as $menu){
                    foreach ($request->action[$menu] as $key => $action) {
                        $userUpdate[] =  [
                            "user_id" => $user->id,
                            "menu_id" => $menu,
                            "action_id" => $action,
                        ];
                    }
                }

                MenuToUser::where('user_id', $user->id)->delete();

            }
            MenuToUser::insert($userUpdate);

            MenuToRole::where('role_id',  $request->role_id)->get();

        }
        

        foreach($request->menu_id as $menu){
            foreach ($request->action[$menu] as $key => $action) {
                $newInsert[] =  [
                    "role_id" => $request->role_id,
                    "menu_id" => $menu,
                    "action_id" => $action,
                ];
            }
        }

        MenuToRole::insert($newInsert);

        return response()->json('success');

        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function getRoles($roleId)
    {
        $data = MenuToRole::where('role_id', $roleId)->get(['menu_id', 'role_id', 'action_id']);

        return response()->json($data);
    }
}
