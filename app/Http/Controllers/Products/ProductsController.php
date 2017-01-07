<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Suppliers;
use Session;
class ProductsController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }
    
    public function index() {
//        $suppliers = Suppliers::all();
//        $suppliers = Suppliers::lists('name', 'id')->prepend('Seleccioname la Supplier');
//        return view("products.index")->with("suppliers", $suppliers);
        return view("products.index");
    }

    public function getSupplier() {
        $suppliers = Suppliers::all();
        return response()->json($suppliers);
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $input["users_id"] = 1;
            $result = Products::create($input);
            if ($result) {
                Session::flash('save', 'Se ha creado correctamente');
                return response()->json(['success' => 'true']);
            } else {
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit($id) {
        $suppliers = Products::FindOrFail($id);
        return response()->json($suppliers);
    }

    public function update(Request $request, $id) {
        $products = Products::FindOrFail($id);
        $input = $request->all();
        $result = $products->fill($input)->save();
        if ($result) {
            Session::flash('save', 'Se ha creado correctamente');
            return response()->json(['success' => 'true']);
        } else {
            return response()->json(['success' => 'false']);
        }
    }

    public function destroy($id) {
        $products = Products::FindOrFail($id);
        $result = $products->delete();
        Session::flash('delete', 'Se ha eliminado correctamente');
        if ($result) {
            Session::flash('save', 'Se ha creado correctamente');
            return response()->json(['success' => 'true']);
        } else {
            return response()->json(['success' => 'false']);
        }
    }

}
