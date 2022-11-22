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
        $purchases = Purchase::orderBy('id', "desc")->get();
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
        $data['description'] = $request->note;
        $data['purchase_no'] = $purchase_no;
        $data['purchase_date'] = \Carbon\Carbon::now();
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

                $item = ItemMaster::with('unit', 'department', 'brand', 'size', 'color')->where('id', $item_id[$key])->first();

                // dd($item->department->name);
                $has_stock = Stock::where('item_id',  $item_id[$key])->first();
                if ($has_stock) {
                    $has_stock->quantity += $qty[$key];
                    $has_stock->save();
                } else {
                    $stock = new Stock;
                    $stock['unique_id'] = UniqueController::uniqueId('unique_id');
                    $stock['barcode'] = $barcodes[$key];
                    $stock['item_id'] = $item_id[$key];
                    $stock['quantity'] = $qty[$key];
                    $stock['uom'] = $unit[$key];
                    $stock['size'] = $item->size->name;
                    $stock['color'] = $item->color->name;
                    $stock['brand'] = $item->brand->name;
                    $stock['department'] = $item->department->name;
                    $stock['category'] = $item->category->name;
                    $stock->save();
                }

                $stockHistory = new  StockHistory;
                $stockHistory['unique_id'] = UniqueController::uniqueId('unique_id');
                $stockHistory['barcode'] = $barcodes[$key];
                $stockHistory['item_id'] = $item_id[$key];
                $stockHistory['quantity'] = $qty[$key];
                $stockHistory['created_by'] = Auth::user()->id;
                $stockHistory['updated_by'] = Auth::user()->id;
                $stockHistory->save();
            }

            Requisition::where('id', $request->requisition_id)->update(array('type' => 'purchased'));
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
