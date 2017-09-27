<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ComponentController extends Controller
{
  public function getComponents(){
    $components = DB::select('select * from component_full;');
    $vendors = DB::select('select * from vendor;');
    $comp_types = DB::select('select * from component_types;');
    return view('components', ['components' => $components, 'vendors' => $vendors, 'comp_types' => $comp_types]);
  }

  public function addDeleteComponent(Request $request){
    if ($request->input('post_type') == 'new'){
      DB::insert('INSERT INTO component (type_fk,vendor_fk,easy_name,model) VALUES (?, ?, ?, ?)', [$request->comp_type,$request->vendor,$request->common_name,$request->model_number]);
    }else if ($request->input('post_type') == 'delete'){
      DB::delete('DELETE FROM component where id = ?;', [$request->comp_id]);
    }
    return $this->getComponents();
  }

  public function getFilteredComponents(Request $r){
    if ($r->filter_types == "none" && $r->filter_vendor =="none"){
      return $this->getComponents();
    }
    $vendors = DB::select('select * from vendor;');
    $comp_types = DB::select('select * from component_types;');
    if ($r->filter_types== "none"){
      $components = DB::select('select * from component_full where vendor_fk = ?;',[$r->filter_vendor]);
    }else if ($r->filter_vendor == "none"){
      $components = DB::select('select * from component_full where type_fk = ?;',[$r->filter_types]);
    }else{
      $components = DB::select('select * from component_full where type_fk = ? and vendor_fk = ? ;',[$r->filter_types, $r->filter_vendor]);
    }
    return view('components', ['components' => $components, 'vendors' => $vendors, 'comp_types' => $comp_types]);
  }

}
