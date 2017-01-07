<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Suppliers;
use Session;
use \Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function index() {
        return view("suppliers.index");
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
            $user = Auth::User();
            $input["users_id"] = 1;
            $result = Suppliers::create($input);
            if ($result) {
                Session::flash('save', 'Se ha creado correctamente');
                return response()->json(['success' => 'true']);
            } else {
                return response()->json(['success' => 'false']);
            }
        }
    }

    public function edit($id) {
        $suppliers = Suppliers::FindOrFail($id);
        return response()->json($suppliers);
    }

    public function update(Request $request, $id) {
        $products = Suppliers::FindOrFail($id);
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
        $products = Suppliers::FindOrFail($id);
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
