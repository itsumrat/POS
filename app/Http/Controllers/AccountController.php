<?php

namespace App\Http\Controllers;

use App\Models\AccountGroup;
use App\Models\AccountSubGroup;
use App\Models\AccountType;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    private $menuId = 24;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return view('errors.401');
        }
        // $customer_types = CustomerType::orderBy('id', 'asc')->get();

        $groups = AccountGroup::orderBy('id', 'desc')->get();
        $types = AccountType::orderBy('id', 'desc')->get();
        $subgroups = AccountSubGroup::orderBy('id', 'desc')->get();
        return view('accounts.index',compact('groups','types','subgroups'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}