<?php

namespace App\Http\Controllers;

use App\Models\ItemMaster;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Requisition;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PurchaseCotroller extends Controller
{
    private $menuId = 6;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // //
        // if (!PermissionAccess::viewAccess($this->menuId, 1)) {
        //     return response()->json('Sorry');
        // }

        $vendor_types = VendorType::orderBy('id', "desc")->get();
        $requisitions = Requisition::orderBy('id', "desc")->where('type', '=', 'order')->get();
        return response()->json(array(
            'vendor_types' => $vendor_types,
            'requisitions' => $requisitions,
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function PurchaseList()
    {
        return Purchase::orderBy('id', 'desc')->get();
    }


    public function create()
    {
        //
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
        // //

        // if (!PermissionAccess::viewAccess($this->menuId, 2)) {
        //     return response()->json('Sorry');
        // }
        $latestOrder = Purchase::orderBy('created_at', 'DESC')->first();
        if ($latestOrder == null) {
            $pur_no = 0;
        } else {
            $pur_no = $latestOrder->id;
        }
        $purchase_no = 'P#' . str_pad($pur_no + 1, 8, "0", STR_PAD_LEFT);

        $items = $request->itemDatas;

        $data['requisition_no'] = $request->requisition_no;
        $data['purchase_no'] = $purchase_no;
        $data['purchase_date'] = \Carbon\Carbon::now();
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['description'] = $request->description;
        $data['grand_total'] = $request->grand_total;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $purchase = Purchase::create($data);
        if ($purchase) {
            foreach ($items as $item) {
                $Pus = new PurchaseDetails;
                $Pus['requisition_no'] = $purchase_no;
                $Pus['unique_id'] = UniqueController::uniqueId('unique_id');
                $Pus['item_id'] = $item['id'];
                $Pus['barcode'] = $item['barcode'];
                $Pus['item_name'] = $item['item_name'];
                $Pus['uom'] = $item['uom'];
                $Pus['quantity'] = $item['quantity'];
                $Pus['old_unit_price'] = $item['old_unit_price'];
                $Pus['new_unit_price'] = $item['new_unit_price'];
                $Pus['subtotal'] = $item['subtotal'];
                $Pus->save();
            }
        }
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
    public function update(Request $request, $uniqueId)
    {
        //

        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }
        $data['requisition_no'] = $request->requisition_no;
        $data['purchase_no'] = $request->purchase_no;
        $data['purchase_date'] = \Carbon\Carbon::now();
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['description'] = $request->description;
        $data['grand_total'] = $request->grand_total;
        $data['updated_by'] = Auth::user()->id;

        Purchase::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
    }
    public function search($search)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $data = Purchase::where('unique_id', "LIKE", '%' . $search . '%')->orWhere('purchase_no', "LIKE", '%' . $search . '%')->get();
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
        //
    }
}
