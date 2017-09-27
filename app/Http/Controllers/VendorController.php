<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function getVendors(){
      $vendors = DB::select('select * from vendor;');
      return view('vendors', ['vendors' => $vendors]);
    }

    public function getVendor($id){
      $vendor = DB::select('select * from vendor where id = ?', [$id]);
      return view('edit_vendor', ['item' => $vendor, 'type' => 'vendors']);
    }

    public function addDeleteVendor(Request $request){
      if ($request->input('post_type') == 'new'){
        DB::insert('INSERT INTO vendor (name) VALUES (?)', [$request->vendor_name]);
      }else if ($request->input('post_type') == 'delete'){
        DB::delete('DELETE FROM vendor where id = ?;', [$request->vendor_id]);
      }
      return $this->getVendors();

    }

    public function updateVendor(Request $request){
      DB::update('update vendor set name = ? where id = ?', [$request->input('new_value'),$request->input('id')]);
      return $this->getVendors();
    }
}
