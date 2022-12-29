<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Department;
use App\Models\ItemMaster;
use App\Models\Size;
use App\Models\Color;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UniqueController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ItemMasterController extends Controller
{
    private $menuId = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return view('errors.401');
        }
        $departments = Department::get();
        $sizes = Size::get();
        $categories = Category::get();
        $brands = Brand::get();
        $units = Unit::get();
        $colors = Color::get();

        $items = ItemMaster::with(['department', 'category', 'brand', 'unit', 'size', 'color','stock'])->orderBy('id', "asc")->paginate(env("DATA_PER_PAGE"));
        // return response()->json($items);

        return view('items.index', compact('items', 'departments', 'sizes', 'categories', 'brands', 'units', 'colors'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 2)) {
            return response()->json('Sorry');
        }


        $data['barcode'] = !isset($request->barcode) ? UniqueController::uqniqueCode('barcode', 'item_masters') : $request->barcode;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['color_id'] = $request->color_id;
        $data['department_id'] = $request->department_id;
        $data['item_name'] = $request->item_name;
        $data['purchase_price'] = $request->purchase_price;
        $data['sale_price'] = $request->sale_price;
        $data['size_id'] = $request->size_id;
        $data['unit_id'] = $request->unit_id;
        $data['unique_id'] = UniqueController::uniqueId('unique_id');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;

        ItemMaster::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($search)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 1)) {
            return response()->json('Sorry');
        }

        $data = ItemMaster::where('unique_id', "LIKE", '%' . $search . '%')->orWhere('name', "LIKE", '%' . $search . '%')->get();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uniqueId)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 3)) {
            return response()->json('Sorry');
        }

        $data['barcode'] = !isset($request->barcode) ? UniqueController::uqniqueCode('barcode', 'item_masters') : $request->barcode;
        $data['brand_id'] = $request->brand_id;
        $data['category_id'] = $request->category_id;
        $data['color_id'] = $request->color_id;
        $data['department_id'] = $request->department_id;
        $data['item_name'] = $request->item_name;
        $data['purchase_price'] = $request->purchase_price;
        $data['sale_price'] = $request->sale_price;
        $data['size_id'] = $request->size_id;
        $data['unit_id'] = $request->unit_id;
        $data['updated_by'] = Auth::user()->id;

        ItemMaster::where('unique_id', $uniqueId)->update($data);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!PermissionAccess::viewAccess($this->menuId, 4)) {
            return response()->json('Sorry');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getPost($barcode)
    {

        $item = ItemMaster::whereHas('stock', function ($query) {
                $query->where('quantity', '>', 0);
        })->with('unit', 'size', 'color', 'brand')->where('barcode', $barcode)->first();

        return $item;
    }
}