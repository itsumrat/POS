<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    private $menuId = 17;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $brands = Unit::orderBy('id', "desc")->get();
        return response()->json($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }

        $data['name'] = $request->name;
        $data['unit_no'] = $request->unit_no;
        $data['created_by'] = Auth::user()->id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['updated_by'] = Auth::user()->id;

        Unit::create($data);
        return back();
        // return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $data = Unit::where('unique_id', "LIKE", '%' . $search . '%')->orWhere('unit_no', "LIKE", '%' . $search . '%')->orWhere('name', "LIKE", '%' . $search . '%')->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     if(!PermissionAccess::viewAccess($this->menuId, 3)){
    //         return response()->json('Sorry');
    //     }
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }

        $data['name'] = $request->name;
        $data['unit_no'] = $request->unit_no;
        $data['updated_by'] = Auth::user()->id;
        Unit::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }
    }
}