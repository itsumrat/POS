<?php

namespace App\Http\Controllers;

use App\Models\MenuToRole;
use App\Models\MenuToUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionAccess extends Controller
{


    /**
     * Action function goes here
     * @static
     * @parameter $menuId, $actionId
     * 
     * All menu permission get data
     */

    public static function access(){
        $menuAccess = MenuToRole::where('role_id', Auth::user()->role_id)->where('action_id', 1)->get(['menu_id', 'action_id']);
        $menus = [];
        foreach($menuAccess as $menu){
            $menus[$menu->menu_id] = $menu->menu_id;
        }


        return $menus;
    }
    

    /**
     * Action function goes here
     * @static
     * @parameter $menuId, $actionId
     * 
     * Menu view permission fuction
     */
    public static function menuAccess($menuId, $actionId){

        $checkAccess = MenuToUser::where('menu_id', $menuId)->where('action_id', $actionId)->where('user_id', Auth::user()->id)->count();

        // its only for super admin permission
        if(Auth::user()->role_id == 1){
            return true;
        }


        // others role permission
        if($checkAccess){
            return true;
        }   

        return false;
    }

    /**
     * Action function goes here
     * @static
     * @parameter $menuId, $actionId
     * 
     * Menu access view permission fuction
     */
    public static function viewAccess($menuId, $actionId){

        $checkAccess = MenuToUser::where('menu_id', $menuId)->where('action_id', $actionId)->where('user_id', Auth::user()->id)->count();

        // its only for super admin permission
        if(Auth::user()->role_id == 1){
            return true;
        }


        // others role permission
        if($checkAccess){
            return true;
        }        
        return false;
    }






}
