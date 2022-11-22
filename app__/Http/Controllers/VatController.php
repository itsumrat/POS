<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VatController extends Controller
{
    private $menuId = 101;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!PermissionAccess::viewAccess($this->menuId, 1)){
            return response()->json('Sorry');
        }

        $vats = Vat::orderBy('id', "desc")->get();
        return response()->json($vats);
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
        if(!PermissionAccess::viewAccess($this->menuId, 2)){
            return response()->json('Sorry');
        }

        $data[$request->name] = $request->inputValue;
        $data['created_by'] = Auth::user()->id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['updated_by'] = Auth::user()->id;
        
        $dataStore = Vat::create($data);
        return response()->json($dataStore);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Vat $vat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Vat $vat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        if(!PermissionAccess::viewAccess($this->menuId, 3)){
            return response()->json('Sorry');
        }

        $data[$request->name] = $request->inputValue;
        $data['updated_by'] = Auth::user()->id;
        
        Vat::where('unique_id', $uniqueId)->update($data);
        $updateData = Vat::where('unique_id', $uniqueId)->first();

        return response()->json($updateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vat  $vat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vat $vat)
    {
        //
    }
}
