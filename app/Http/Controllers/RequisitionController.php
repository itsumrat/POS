<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use App\Models\RequisitionDetails;
use App\Models\ItemMaster;
use Illuminate\Http\Request;
use App\Models\VendorType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Vat;



class RequisitionController extends Controller
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
        $reqs = Requisition::orderBy('id', "desc")->get();
        $vendor_types = VendorType::orderBy('id', "desc")->get();
        return view('requisition.index', compact('vendor_types', 'reqs'));
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
        //dd($request);
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

        // $data = $request->R;
        // foreach ($data as $k => $d) {
        //     echo $k;
        // }
        //dd($data);
        // $items = $request->barcode;
        $barcodes = $request->barcode;
        $item_name = $request->item_name;
        $qty = $request->qty;
        $item_id = $request->id;
        $unit = $request->uom;
        $sub_total = $request->sub_total;
        $unit_price = $request->unit_cost;

        //$items = ItemMaster::get();
        //dd($items);

        $data['requisition_no'] = $requisition_no;
        $data['requisition_date'] = \Carbon\Carbon::now();
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor;
        $data['total'] = $request->item_total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['grand_total'] = $request->grand_total;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $requisition = Requisition::create($data);
        if ($requisition) {
            foreach ($barcodes as $key => $value) {

                //echo $barcodes[$k];


                $reqDetail = new RequisitionDetails;
                $reqDetail['requisition_id'] = $requisition->id;
                $reqDetail['unique_id'] = UniqueController::uniqueId('unique_id');
                $reqDetail['item_id'] = $item_id[$key];
                $reqDetail['barcode'] = $barcodes[$key];
                $reqDetail['item_name'] = $item_name[$key];
                $reqDetail['uom'] = $unit[$key];
                $reqDetail['quantity'] = $qty[$key];
                $reqDetail['unit_price'] = $unit_price[$key];
                $reqDetail['subtotal'] = $sub_total[$key];
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
    public function edit($uniqueId){
        $data = Requisition::with('reqs')->where('unique_id', $uniqueId)->first();
        return response()->json($data);
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
//dd($request);
        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }


        // $data['requisition_no'] = $request->requisition_no;
        // $data['requisition_date'] = \Carbon\Carbon::now();
        // $data['unique_id'] = UniqueController::uniqueId('unique_id');
        // $data['vendor_id'] = $request->vendor_id;
        $data['total'] = $request->item_total;
        $data['vat'] = $request->vat;
        $data['other_charge'] = $request->other_charge;
        $data['discount'] = $request->discount;
        $data['grand_total'] = $request->grand_total;
        $data['status'] = 0;
        $data['type'] = 'order';
        $data['updated_by'] = Auth::user()->id;

        Requisition::where('unique_id', $uniqueId)->update($data);

        $items = $request->req_item_id;
        $qty = $request->qty;
        $sub_total = $request->sub_total;
        foreach ($items as $key => $value) {
            $reqDetail['quantity'] = $qty[$key];
            $reqDetail['subtotal'] = $sub_total[$key];
            RequisitionDetails::where('id', $items[$key])->update($reqDetail);
        }
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
    public function destroy($uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }
        
        Requisition::where('unique_id', $uniqueId)->delete();
        return redirect()->back();
    }
    public function destroyDetails($uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }

        
        RequisitionDetails::where('id', $uniqueId)->delete();
    }

    public function getItem($barcode)
    {
        $item = ItemMaster::with('unit', 'size', 'color')->where('barcode', $barcode)->first();
        return $item;

    }

    public function getVat()
    {
        //dd($barcode);
        $vat = Vat::first();
        return json_decode($vat);

        //return $item;
    }
}
