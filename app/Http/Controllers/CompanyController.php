<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanyController extends Controller
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
        //
        $profilePath = public_path('assets/img/companies/');
        if ($request->Hasfile('profile_image')) {
            $imageName = Str::slug($request->name, '_') . '_' . rand(1000000, 9999999);
            $extenstion = $request->file('profile_image')->getClientOriginalExtension();

            $request->profile_image->move($profilePath, $imageName . '.' . $extenstion);

            $data['image'] = $imageName . '.' . $extenstion;
        }
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['name'] = $request->name;
        $data['contact_no'] = $request->contact_no;
        $data['address'] = $request->address;
        $data['trade_license_no'] = $request->trade_license_no;
        $data['tin_no'] = $request->tin_no;
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        Company::create($data);
        return back();
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