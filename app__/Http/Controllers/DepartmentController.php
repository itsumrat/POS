<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

    private $menuId = 11;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!PermissionAccess::viewAccess($this->menuId, 1)){
            return response()->json('Sorry');
        }

        return Department::orderBy('id', 'DESC')->get();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!PermissionAccess::viewAccess($this->menuId, 2)){
            return response()->json('Sorry');
        }

        $data[$request->name] = $request->departmentValue;
        $data['created_by'] = Auth::user()->id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['updated_by'] = Auth::user()->id;
        
        Department::create($data);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        if(!PermissionAccess::viewAccess($this->menuId, 1)){
            return response()->json('Sorry');
        }

        $data = Department::where('unique_id', "LIKE", '%'. $search .'%' )->orWhere('name', "LIKE", '%'. $search .'%' )->get();
        return response()->json($data);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        if(!PermissionAccess::viewAccess($this->menuId, 3)){
            return response()->json('Sorry');
        }

        $data[$request->name] = $request->departmentValue;
        $data['updated_by'] = Auth::user()->id;
        
        Department::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        if(!PermissionAccess::viewAccess($this->menuId, 4)){
            return response()->json('Sorry');
        }
    }
}
