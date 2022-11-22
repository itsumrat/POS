<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PosTransactionControllerasdfa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data['exchange'] = $request->exchange;
        $data['returnAmount'] = $request->returnAmount;

        // foreach($request->itemDatas as $item ) { 
        //     $data['barcode'] = $item->barcode;
        //     $data['color'] = $item->color;
        //     $data['product_id'] = $item->id;
        //     $data['price'] = $item->price;
        //     $data['quantity'] = $item->qty;
        //     $data['size'] = $item->size;
        //     $data['total_amount'] = $item->subTotal;
        //     $data['title'] = $item->title;
        //     $data['unit'] = $item->unit;
        //     $data['created_at'] = now();
        //     $data['updated_at'] = now();
        //     $data['created_by'] = Auth::user()->id;
        // }

        return $request->all();
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
