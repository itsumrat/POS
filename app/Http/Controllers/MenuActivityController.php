<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuActivity;
use App\Models\MenuToRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function permission()
    {
        
        $menuActivites =  Menu::with('actions')->get();

        return $menuActivites;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MenuToRole::where('role_id', $request->role_id)->delete();
        $data['role_id'] = $request->role_id;
        
        for($i = 0; $i < count($request->actionData); $i++){

            $explode = explode('_', $request->actionData[$i]);
            $data['menu_id'] = $explode[0];
            $data['action_id'] = $explode[1];

            MenuToRole::create($data);
            
            echo $request->actionData[$i];
        }
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function show(MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuActivity $menuActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuActivity $menuActivity)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuActivity  $menuActivity
     * @return \Illuminate\Http\Response
     */
    static public function actionCheck($menuId, $actionId){
        
        $check = MenuActivity::where('menu_id', $menuId)->where('action_id', $actionId)->count();
        return $check;
    }
}
