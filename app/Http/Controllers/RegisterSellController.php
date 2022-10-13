<?php

namespace App\Http\Controllers;

use App\Models\RegisterSell;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterSellController extends Controller
{

    // private $menuId = 100;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $sellRegister = RegisterSell::where('created_by', Auth::user()->id)
                                    ->where('created_day', date("Y-m-d", strtotime(Carbon::now())))
                                    ->where('status', "Open")
                                    ->count();

        $checkClose = RegisterSell::where('created_by', Auth::user()->id)
                                    ->where('created_day', date("Y-m-d", strtotime(Carbon::now())))                                   
                                    ->where('status', "Close")                                                                      
                                    ->count();


        $data["register_no"] = $request->register_no;
        $data["openning_balance"] = $request->openning_balance;        
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['staff_id'] = Auth::user()->staff_id;
        $data['created_day'] = Carbon::now();

        if($checkClose > 0 ){
            return response()->json('Sorry');
        }

        if($sellRegister > 0 ){

            $updat['status'] = "Close";
            $dataUpdate = RegisterSell::where("register_no", $request->register_no)->update($updat);

            if($dataUpdate){
                $dataStore = RegisterSell::where("register_no", $request->register_no)->first();
                return response()->json($dataStore);
            }else{
                return response()->json("exit");
            }
            

        }else{

            Session::put('posWindow', $request->register_no);

            $data['status'] = "Open";
            
            $dataStore = RegisterSell::create($data);

            return response()->json($dataStore);
            
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($register)
    {
        $dataStore = RegisterSell::where( "register_no", $register )
        ->where('created_day', date('Y-m-d', strtotime( Carbon::now())))
        ->orWhere(function($query){
            $query->where('created_day', date('Y-m-d', strtotime( Carbon::now())))
            ->where('staff_id', Auth::user()->unique_id);
        })->first();

        if(!$dataStore){
            return response()->json('not_exit');
        }

        return response()->json($dataStore);
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
