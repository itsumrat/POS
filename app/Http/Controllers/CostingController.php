<?php

namespace App\Http\Controllers;

use App\Models\PurchaseDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CostingController extends Controller
{

    private $menuId = 3;

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
        // $customer_types = CustomerType::orderBy('id', 'asc')->get();

        // $customers = Customer::with('type')->orderBy('id', 'desc')->get();
        return view('costing.index');

    }


    public function oldPrice(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            $data = PurchaseDetails::select('created_at', 'old_unit_price')->where('barcode', $query)->take(10)->get();

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $created_at = Carbon::parse($row->created_at)->format('d-M-Y');
                    $output .= '<tr><td>' . $created_at . '</td><td>' . $row->old_unit_price . '</td></tr>';
                }
            } else {
                $output .= '<tr><td align="center" colspan="5">No Data Found!</td></tr>';
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
    }

    public function newPrice(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            $data = PurchaseDetails::select('created_at', 'new_unit_price')->where('barcode', $query)->take(10)->get();

            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $created_at = Carbon::parse($row->created_at)->format('d-M-Y');
                    $output .= '<tr><td>' . $created_at . '</td><td>' . $row->new_unit_price . '</td></tr>';
                }
            } else {
                $output .= '<tr><td align="center" colspan="5">No Data Found!</td></tr>';
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
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