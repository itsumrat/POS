<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\ItemMaster;
use App\Models\PosTransactions;
use App\Models\SellTransaction;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PosTransactionController extends Controller
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
       

        if($request->status == "Return"){
            $transaction = $request->oldTransactionId;
            
        }else{
            $transaction = UniqueController::checkUniqueId('transaction_id', 'sales');
        }
        
        $data['register_no'] = Auth::user()->register->register_no;
        $data['vat'] = 0;
        $data['tax'] = 0;
        $data['transaction_id'] =  $transaction;
        $data['customer_id'] = $request->customer_id;
        $totalAmount = [];
        $totalQuanity = [];


        foreach($request->itemDatas as $item ) { 
            $data['barcode'] = $item['barcode'];
            $data['color'] = $item['color'];
            $data['product_id'] = $item['id'];
            $data['price'] = $item['price'];
            $data['quantity'] = $item['quantity'];
            $data['size'] = $item['size'];
            $data['total_amount'] = $item['price'];           
            $data['product_title'] = $item['product_title'];
            $data['unit'] = $item['unit'];
            $data['status'] = $request->status;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $data['created_by'] = Auth::user()->id;

            $totalAmount[] = $item['price'];
            $totalQuanity[] = $item['quantity'];

            $allData[] = $data;
            $productId[] = $item['id'];


            $stockData = ItemMaster::with('stock')->where('barcode', $item['barcode'])->first();

            $inventory['barcode'] = $item['barcode'];
            $inventory['status'] = 'Sales';
            $inventory['item_id'] = $item['id'];
            $inventory['stock_id'] = $stockData->stock->id;
            $inventory['unique_id'] = UniqueController::checkUniqueId('unique_id', 'inventory_history');
            $inventory['quantity'] = $item['quantity'];
            $inventory['created_by'] = Auth::user()->id;
            $inventory['updated_by'] = Auth::user()->id;

            $quantity = ($stockData->stock->quantity - $item['quantity']);
            Stock::where('id', $stockData->stock->id)->update(['quantity' => $quantity]);
            Inventory::create($inventory);


        }

        
        if($request->status == "Return"){

            PosTransactions::where('transaction_id', $request->oldTransactionId)->whereIn('product_id', $productId)->delete();
            
        }else{
            PosTransactions::where('transaction_id', $request->oldTransactionId)->delete();
        }

        PosTransactions::insert($allData);
        

        $trans['transaction_id'] =  $transaction;
        $trans['order_no'] =  UniqueController::checkUniqueId('transaction_id', 'sell_transactions');
        $trans['total_amount'] =  array_sum($totalAmount);
        $trans['quantity'] =  array_sum($totalQuanity);
        $trans['exchange_amount'] = $request->exchange;
        $trans['return_amount'] = $request->returnAmount;
        $trans['customer_id'] = $request->customer_id;
        $trans['vat'] = 0;
        $trans['tax'] = 0;
        $trans['payment_type'] = $request->payment;
        $trans['register_no'] = Session::get('posWindow');
        $trans['status'] = $request->status;
        $trans['others_transaction_id'] = $request->paymentTrasaction;

        $trans['vat_amount'] = isset($request->flatFixedAmount['Vat_amount']) ? $request->flatFixedAmount['Vat_amount'] : 0;
        $trans['vat'] = isset($request->flatFixedAmount['Vat_discount']) ? $request->flatFixedAmount['Vat_discount'] : 0;
        $trans['discount'] = isset($request->flatFixedAmount['Discount_discount']) ? $request->flatFixedAmount['Discount_discount'] : 0;
        $trans['discount_amount'] = isset($request->flatFixedAmount['Discount_amount']) ? $request->flatFixedAmount['Discount_amount'] : 0;

        $trans['grand_total'] = isset($request->flatFixedAmount) ? (($trans['vat_amount']+$trans['total_amount'])-$trans['discount_amount']) : 0;

        $trans['created_at'] = now();
        $trans['updated_at'] = now();

        SellTransaction::insert($trans);

        if($request->status != "Return"){
            SellTransaction::where('transaction_id', $request->oldTransactionId)->delete();
        }

        return $transaction;
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