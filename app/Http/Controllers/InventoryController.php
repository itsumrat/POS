<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\VendorType;
use Illuminate\Support\Facades\Auth;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Stock::orderBy('id', "desc")->get();

        return view('inventory.index', compact('stocks'));
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

        $stock_info = $request->stock_info;
        foreach($stock_info as $v){
            echo $v['id']."".$v['pq']."\n";

            $has_stock = Stock::where('id',  $v['id'])->first();
            if ($has_stock) {
            $has_stock->quantity = $v['pq'];
            $has_stock->save();


            $data = new  Inventory;
            $data['unique_id'] = UniqueController::uniqueId('unique_id');
            $data['barcode'] =$has_stock->barcode;
            $data['item_id'] = $v['item_id'];
            $data['status'] = $v['status'];
            $data['stock_id'] = $v['id'];
            $data['quantity'] = $v['pq'];;
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;
            $data->save();
            }
        }
        /*
        foreach ($itemid as $key => $value) {
            //return response($itemid[$value]);
            if (in_array($itemid[$key], $checked_array)) { 

                return response('success');
                # code...  
               // $has_stock = Stock::where('id',  $request->stockid[$value])->first();
               // dd($request->stockid[$key]);
                // if ($has_stock) {
                //     $has_stock->quantity = 20;
                //     $has_stock->save();
                // }

            }
            # code...
        }*/
        //return $stock_info;
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
