<?php

namespace App\Http\Controllers;

use App\Models\VendorType;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class VendorController extends Controller
{

    private $menuId = 8;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $vendor_types = VendorType::orderBy('id', "desc")->get();
        $vendors = Vendor::orderBy('id', "desc")->get();
        //return response()->json($vendor_types);
        return view('vendor.index', compact('vendor_types', 'vendors'));
    }



    public function vendorList()
    {
        return Vendor::orderBy('id', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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

        $data = $request->all();
        $data['created_by'] = Auth::user()->id;
        $data['current_balance'] = $request->opening_balance;
        $data['updated_by'] = Auth::user()->id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        Vendor::create($data);

        return $this->index();
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

        $data = Vendor::where('unique_id', "LIKE", '%' . $search . '%')->orWhere('vendor_name', "LIKE", '%' . $search . '%')->get();
        return response()->json($data);
    }
    public function vendorSingle($id)
    {
        //dd($id);
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $data = Vendor::where('id', $id )->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uniqueId){
        $data = Vendor::where('unique_id', $uniqueId)->first();
        return response()->json($data);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        //
        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }
        $data['vendor_type'] = $request->vendor_type;
        $data['nid_no'] = $request->nid_no;
        $data['vendor_name'] = $request->vendor_name;
        $data['address'] = $request->address;
        $data['vendor_contact'] = $request->vendor_contact;
        $data['opening_balance'] = $request->opening_balance;

        $data['updated_by'] = Auth::user()->id;

        Vendor::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uniqueId)
    {
        //
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }

        Vendor::where('unique_id', $uniqueId)->delete();
        return redirect()->back();
    }
}
