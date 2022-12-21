<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountGroup;
use App\Models\AccountSubGroup;
use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        $accounts = Account::with('type','group','subgroup')->get();
        return view('accounts.index', compact('groups', 'types', 'subgroups','accounts'));
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
        //
        //
        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }

        $data['name'] = $request->name;
        $data['account_type'] = $request->account_type;
        $data['account_group'] = $request->account_group;
        $data['account_subgroup'] = $request->account_subgroup;
        $data['opening_balance'] = $request->opening_balance;
        $data['current_balance'] = $request->opening_balance;
        $data['created_by'] = Auth::user()->id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['updated_by'] = Auth::user()->id;

        Account::create($data);
        return back();
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
