<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payables;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PayablesController extends Controller
{
    private $menuId = 22;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return view('errors.401');
        }
        $vendors = Vendor::orderBy('id', 'asc')->get();
        $accounts = Account::orderBy('id', 'desc')->get();
        $payables = Payables::with('vendor')->orderBy('id', 'desc')->get();
        return view('payables.index', compact('vendors', 'accounts','payables'));

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
        //

        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }

        $latestRefNo = Payables::orderBy('created_at', 'DESC')->first();
        if ($latestRefNo == null) {
            $req_no = 0;
        } else {
            $req_no = $latestRefNo->id;
        }

        $cb =$request->current_balance;
        $pay_amt = $request->pay_amount;
        $ref_no = 'PV-' . str_pad($req_no + 1, 8, "0", STR_PAD_LEFT);
        $data['ref_no'] = $ref_no;
        $data['payment_date'] = $request->payment_date;;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['vendor_id'] = $request->vendor_id;
        $data['pay_amount'] = $pay_amt;
        $data['payment_type'] = $request->payment_type;
        $data['cheque_no'] = $request->cheque_no;
        $data['account_id'] = $request->account_id;
        $data['description'] = $request->description;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        $payable = Payables::create($data);

        if($payable){
            $balance = $cb - $pay_amt;
            $vendordata['current_balance'] = $balance;
            Vendor::where('id', $request->vendor_id)->update($vendordata);

            $accBalance = Account::where('id',$request->account_id)->first();
            $prev_cbalance= $accBalance->current_balance;
            $new_balance = $prev_cbalance-$pay_amt;


            $accdata['current_balance'] = $new_balance;
            Account::where('id', $request->account_id)->update($accdata);
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
