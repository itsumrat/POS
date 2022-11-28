<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\RegisterSell;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['registers'] = Register::get('name');
        return view('home', $data);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getRegister($register)
    {
        $data['registers'] = RegisterSell::where('status', 'Open')->where('register_no', $register)->first();
        return response()->json($data['registers']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function store(Request $request){

        $data = $request->except('_token');
        $check = RegisterSell::where('status', 'Open')->where('register_no', $request->register_no)->count();

        RegisterSell::where('status', 'Open')->where('created_day', '<', date("Y-m-d", strtotime(Carbon::now()) ))->update(['status' => "Close"]);

        if($check > 0){

            $data['status'] = "Close";
            $data['updated_by'] = Auth::user()->id;
            RegisterSell::where('status', 'Open')->where('register_no', $request->register_no)->update($data);


        }else{
            $data['status'] = "Open";
            $data['staff_id'] = Auth::user()->staff_id;
            $data['created_day'] = date('Y-m-d', strtotime(Carbon::now()));
            $data['created_by'] = Auth::user()->id;
            $data['updated_by'] = Auth::user()->id;

            Session::put('registerNo', $request->register_no);

            RegisterSell::create($data);
            
        }
        
        return response()->json($data['status']);
    }


    


    
}
