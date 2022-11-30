<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    private $menuId = 100;
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

        $retister = Register::orderBy('id', "desc")->get();
        return response()->json($retister);
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
        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['name'] = $request->name;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $dataStore = Register::create($data);
        Session::put('registerNo', $request->name);
        //return $this->index();
        //return response()->json($dataStore);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Register  $vat
     * @return \Illuminate\Http\Response
     */
    public function show(Register $vat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Register  $vat
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $vat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $vat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }

        $data[$request->name] = $request->inputValue;
        $data['updated_by'] = Auth::user()->id;

        Register::where('unique_id', $uniqueId)->update($data);
        $updateData = Register::where('unique_id', $uniqueId)->first();

        return response()->json($updateData);
    }


    /**
     * For Public Data resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Register  $vat
     * @return \Illuminate\Http\Response
     */

    public function List()
    {
        $retister = Register::orderBy('id', "desc")->get();
        return response()->json($retister);
    }
}