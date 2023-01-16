<?php

namespace App\Http\Controllers;

use App\Models\ItemMaster;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Requisition;
use App\Models\RequisitionDetails;
use App\Models\Stock;
use App\Models\StockHistory;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PurchaseController extends Controller
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
        // return response()->json(array(
        //     'vendor_types' => $vendor_types,
        //     'requisitions' => $requisitions,
        // ));
        $purchases = Purchase::orderBy('id', "asc")->get();
        return view('purchase.index', compact('vendor_types', 'requisitions', 'purchases'));
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
    public function purchaseStatus(Request $request)
    {
        $stock_info = $request->stock_info;
        foreach ($stock_info as $v) {
            $items = PurchaseDetails::where('purchase_id',  $v['id'])->get();

            $has_data = Purchase::where('id',  $v['id'])->first();
            if ($has_data) {
                $has_data->status = $v['status'];
                $has_data->save();
            }
            $purchases = PurchaseDetails::where('purchase_id',  $v['id'])->get();
            if ($purchases) {
                foreach ($purchases as $purchase) {

                    $item = ItemMaster::with('unit', 'department', 'brand', 'size', 'color')->where('id', $purchase->item_id)->first();
                    // $stock = 

                    $has_stock = Stock::where('item_id',  $purchase->item_id)->first();
                    if ($has_stock) {
                        $has_stock->quantity += $purchase->quantity;
                        $has_stock->save();
                    } else {
                        $stock = new Stock;
                        $stock['unique_id'] = UniqueController::uniqueId('unique_id');
                        $stock['barcode'] = $purchase->barcode;
                        $stock['item_id'] =  $purchase->item_id;
                        $stock['quantity'] = $purchase->quantity;
                        $stock['uom'] = $purchase->uom;
                        $stock['size'] = $item->size->name;
                        $stock['color'] = $item->color->name;
                        $stock['brand'] = $item->brand->name;
                        $stock['department'] = $item->department->name;
                        $stock['category'] = $item->category->name;
                        $stock->save();
                    }

                    $stockHistory = new  StockHistory;
                    $stockHistory['unique_id'] = UniqueController::uniqueId('unique_id');
                    $stockHistory['barcode'] = $purchase->barcode;
                    $stockHistory['item_id'] = $purchase->item_id;
                    $stockHistory['quantity'] = $purchase->quantity;
                    $stockHistory['created_by'] = Auth::user()->id;
                    $stockHistory['updated_by'] = Auth::user()->id;
                    $stockHistory->save();
                }
            }
            //return $item;
            Requisition::where('id', $has_data->requisition_no)->update(array('type' => 'purchased'));
        }
        return $this->index();

    }

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

        $barcodes = $request->barcode;
        $item_name = $request->item_name;
        $qty = $request->qty;
        $item_id = $request->id;
        $unit = $request->uom;
        $sub_total = $request->sub_total;
        $old_unit_price = $request->old_unit_price;
        $new_unit_price = $request->new_unit_price;

        // $items = $request->itemDatas;

        $data['requisition_no'] = $request->requisition_id;
        $data['purchase_no'] = $purchase_no;
        $data['description'] = $request->note;
        $data['purchase_date'] = \Carbon\Carbon::now();
        $data['status'] = 'Purchased';
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->item_total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['description'] = $request->description;
        $data['grand_total'] = $request->grand_total;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $purchase = Purchase::create($data);
        if ($purchase) {
            foreach ($barcodes as $key => $value) {
                $Pus = new PurchaseDetails;
                $Pus['purchase_no'] = $purchase_no;
                $Pus['purchase_id'] = $purchase->id;
                $Pus['unique_id'] = UniqueController::uniqueId('unique_id');
                $Pus['item_id'] = $item_id[$key];
                $Pus['barcode'] = $barcodes[$key];
                $Pus['item_name'] = $item_name[$key];
                $Pus['uom'] = $unit[$key];
                $Pus['quantity'] = $qty[$key];
                $Pus['old_unit_price'] = $old_unit_price[$key];
                $Pus['new_unit_price'] = $new_unit_price[$key];
                $Pus['subtotal'] = $sub_total[$key];
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
    public function edit($uniqueId){
        $data = Purchase::with('details')->where('unique_id', $uniqueId)->first();
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
        $data['total'] = $request->total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['grand_total'] = $request->grand_total;
        $data['updated_by'] = Auth::user()->id;

        $purchase=Purchase::where('unique_id', $uniqueId)->update($data);
        $items = $request->req_item_id;
        $qty = $request->qty;
        $sub_total = $request->sub_total;
        if ($purchase) {
            foreach ($items as $key => $value) {
                $reqDetail['quantity'] = $qty[$key];
                $reqDetail['subtotal'] = $sub_total[$key];
                PurchaseDetails::where('id', $items[$key])->update($reqDetail);
            }
        }
        return $this->index();
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
    public function destroy($uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }
        
        Purchase::where('unique_id', $uniqueId)->delete();
        return redirect()->back();
    }

    public function destroyDetails($uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }

        
        PurchaseDetails::where('id', $uniqueId)->delete();
    }

    public function requisition($search)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        // $data = Requisition::Join('requisition_details', function ($join)  use ($search) {

        //     $join->on('requisitions.requisition_no', '=', 'requisition_details.requisition_no')
        //         ->Where('requisition_no', "=", $search);
        // })
        //     ->get();


        $data = RequisitionDetails::where('requisition_id', $search)->with('reqs')->get();
        // $data = Requisition::Where('requisition_nid', "=", $search)->with('reqs')->get();
        // return response()->json($data);
        return response()->json($data);
    }
}
