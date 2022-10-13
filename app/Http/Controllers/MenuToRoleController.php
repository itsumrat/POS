<?php

namespace App\Http\Controllers;

use App\Models\MenuToRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuToRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesses = MenuToRole::where('role_id', Auth::user()->role_id)->get(['menu_id', 'action_id']);
        $accessData = [];
        foreach($accesses as $accesses){
            $accessData[$accesses->menu_id.'_'.$accesses->action_id] = $accesses->menu_id.'_'.$accesses->action_id;
        }

        return $accessData;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuToRole  $menuToRole
     * @return \Illuminate\Http\Response
     */
    public function show(MenuToRole $menuToRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuToRole  $menuToRole
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuToRole $menuToRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuToRole  $menuToRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuToRole $menuToRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuToRole  $menuToRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuToRole $menuToRole)
    {
        //
    }
}
