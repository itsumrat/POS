<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use App\Models\RequisitionDetails;
use App\Models\ItemMaster;
use Illuminate\Http\Request;
use App\Models\VendorType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RequisitionCotroller extends Controller
{
    private $menuId = 5;

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
        return response()->json($vendor_types);
    }


    public function RequisitionList()
    {
        return Requisition::orderBy('id', 'desc')->get();
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
        //

        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }
        $latestOrder = Requisition::orderBy('created_at', 'DESC')->first();
        if ($latestOrder == null) {
            $req_no = 0;
        } else {
            $req_no = $latestOrder->id;
        }
        $requisition_no = 'R#' . str_pad($req_no + 1, 8, "0", STR_PAD_LEFT);


        $items = $request->itemDatas;
        //$items = ItemMaster::get();

        $data['requisition_no'] = $requisition_no;
        $data['requisition_date'] = \Carbon\Carbon::now();
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['grand_total'] = $request->grand_total;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $requisition = Requisition::create($data);
        if ($requisition) {
            foreach ($items as $item) {
                $reqDetail = new RequisitionDetails;
                $reqDetail['requisition_no'] = $requisition_no;
                $reqDetail['unique_id'] = UniqueController::uniqueId('unique_id');
                $reqDetail['item_id'] = $item['id'];
                $reqDetail['barcode'] = $item['barcode'];
                $reqDetail['item_name'] = $item['item_name'];
                $reqDetail['uom'] = $item['uom'];
                $reqDetail['quantity'] = $item['quantity'];
                $reqDetail['unit_price'] = $item['unit_price'];
                $reqDetail['subtotal'] = $item['subtotal'];
                $reqDetail->save();
            }
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        //

        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }


        $data['requisition_no'] = $request->requisition_no;
        $data['requisition_date'] = \Carbon\Carbon::now();
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['grand_total'] = $request->grand_total;
        $data['status'] = 0;
        $data['type'] = 'order';
        $data['updated_by'] = Auth::user()->id;

        Requisition::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
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

        $data = Requisition::where('unique_id', "LIKE", '%' . $search . '%')->orWhere('requisition_no', "LIKE", '%' . $search . '%')->get();
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
        //
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }
    }
}
