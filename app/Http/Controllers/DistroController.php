<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DistroController extends Controller
{
  public function getDistros(){
    $distros = DB::select('select * from distros;');
    return view('distros', ['distros' => $distros]);
  }

  public function getDistro($id){
    $distro = DB::select('select * from distros where id = ?', [$id]);
    return view('edit_distro', ['item' => $distro, 'type' => 'distros']);
  }

  public function addDeleteDistro(Request $request){
    if ($request->input('post_type') == 'new'){
      DB::insert('INSERT INTO distros (name) VALUES (?)', [$request->distro_name]);
    }else if ($request->input('post_type') == 'delete'){
      DB::delete('DELETE FROM distros where id = ?;', [$request->distro_id]);
    }
    return $this->getDistros();
  }

  public function updateDistro(Request $request){
    DB::update('update distros set name = ? where id = ?', [$request->input('new_value'),$request->input('id')]);
    return $this->getDistros();
  }
}
