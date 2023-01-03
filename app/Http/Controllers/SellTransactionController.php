<?php

namespace App\Http\Controllers;

use App\Models\SellTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SellTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['completed'] = SellTransaction::where('register_no', Session::get('posWindow'))->where('status', 'Completed')->orderBy('created_at', "DESC")->limit(5)->get();
        $data['hold'] =  SellTransaction::where('register_no', Session::get('posWindow'))->where('status', 'Hold')->orderBy('created_at', "DESC")->limit(6)->get();
        $data['return'] =  SellTransaction::where('register_no', Session::get('posWindow'))->where('status', 'Return')->orderBy('created_at', "DESC")->limit(3)->get();
        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($transactionId)
    {
        Session::put('transactionId', $transactionId);
        $data['completed'] = SellTransaction::with('sales')->where('register_no', Session::get('posWindow'))
        ->where("transaction_id", "LIKE", "%".$transactionId."%")
        ->orderBy('created_at', "DESC")->first();
        return $data;
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHold($transactionId)
    {
        return SellTransaction::with('sales')->where('transaction_id', $transactionId)
            // ->where('status', 'Hold')
        ->first();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($transactionId)
    {
        return SellTransaction::with('sales')->where('transaction_id', $transactionId)->first();
    }
}
