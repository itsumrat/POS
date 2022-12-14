<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use App\Models\Register;
use App\Models\Role;
use App\Models\Company;
use App\Models\Vat;
use App\Models\User;
use App\Models\VendorType;
use Illuminate\Http\Request;

class PosSettingsController extends Controller
{

    private $menuId = 9;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return view('errors.401');
        }
        $register = Register::get();
        $vat = Vat::get();
        $customer_types = CustomerType::get();
        $vendor_types = VendorType::get();
        $roles = Role::get();
        $users = User::with('role')->get();
        $companies = Company::get();
        return view('settings.index', compact('register', 'vat', 'customer_types', 'vendor_types', 'roles', 'users', 'companies'));
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