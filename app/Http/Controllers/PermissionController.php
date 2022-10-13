<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Menu;
use App\Models\MenuActivity;
use App\Models\MenuToRole;
use App\Models\MenuToUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private $menuId = 7;

    public function permissionview(){

        if(!PermissionAccess::viewAccess($this->menuId, 1)){
            return view('errors.419');
        }

        $menu_activities = Menu::with('actions')->get();
        $actions = Action::get();
        $roles = Role::get();

        return view('permission.permission_view', compact('menu_activities', 'actions', 'roles'));
    }


    /**
     * check permission by role_id
     * @method get
     * perameter $role_id
     * 
     */

    public function getPermission($roleId){

        if(!PermissionAccess::viewAccess($this->menuId, 2)){
            return view('errors.419');
        }

        $roleId = MenuToRole::where('role_id', $roleId)->get(['menu_id', 'role_id', 'action_id']);

        return response()->json($roleId);


    }


    /**
     * permission store function
     * @method Post
     * $request
     * 
     */

    public function store(Request $request){

        if(!PermissionAccess::viewAccess($this->menuId, 2)){
            return view('errors.419');
        }

        $permission['role_id'] = $request->role_id;

        MenuToRole::where('role_id', $request->role_id)->delete();              

        foreach($request->action as $menuId => $actions){
            $permission['menu_id'] = $menuId;
            
            foreach($actions as $action){

                $permission['action_id'] = $action;
                
                // $check = MenuToRole::where('role_id', $request->role_id)->where('menu_id', $menuId)->where('action_id', $action)->count();
                
                // if($check){
                    
                //     MenuToRole::where('role_id', $request->role_id)->where('menu_id', $menuId)->where('action_id', $action)->update($permission);
                // }

                MenuToRole::create($permission);
                
            }

        }

        
        $users = User::where('role_id', $request->role_id)->get('id');

        if(isset($request->exist_check)){
            foreach($users as $user){

                MenuToUser::where('user_id', $user->id)->delete();
    
                $userPermission['user_id'] = $user->id;
                foreach($request->action as $menuId => $actions){
                    $userPermission['menu_id'] = $menuId;
                    
                    foreach($actions as $action){
                        $userPermission['action_id'] = $action;
                        MenuToUser::create($userPermission);
                    }
        
                }
            }
        }

        return redirect()->back()->with(['msg' => 'Permission Update Succeesful']);
    }
}
