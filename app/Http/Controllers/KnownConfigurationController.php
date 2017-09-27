<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KnownConfigurationController extends Controller
{
  public function getConfigs(){
    $items = $this->getAllItems();
    $configs = DB::select('select * from base_information;');
    $items['configs'] = $configs;
    return view('known_configurations', $items );
  }

  public function getConfig($id){
    $items = $this->getAllItems();
    $config = DB::select('select * from known_configurations where id = ?', [$id]);
    $items['config'] = $config[0];
    return view('edit_config', $items );
  }

  public function addEditDeleteConfig(Request $r){
    if ($r->input('post_type') == 'new'){
      if ($r->working_checkbox == "on"){
        $work = 1;
      }else{
        $work = 0;
      }
      DB::insert('INSERT INTO known_configurations (mobo_id,cpu_id,host_gpu_id,pass_gpu_1_id,distro_id,distro_version,kernel,hypervisor,hypervisor_version,qemu_version,patches,notes,working) VALUES
                  (?,?,?,?,?,?,?,?,?,?,?,?,?)', [$r->mobo_select,$r->cpu_select,$r->gpu_a_select,$r->gpu_b_select,$r->distro_select,$r->distro_version,$r->kernel_version,
                                             $r->hypervisor_select,$r->hypervisor_version,$r->qemu_version,$r->patches,$r->notes,$work]);
    }else if ($r->input('post_type') == 'delete'){
      DB::delete('DELETE FROM known_configurations where id = ?', [$r->config_id]);
    }else if ($r->input('post_type') == 'update'){
      if ($r->working_checkbox == "on"){
        $work = 1;
      }else{
        $work = 0;
      }
      DB::update("UPDATE known_configurations SET mobo_id=?,cpu_id=?,host_gpu_id=?,pass_gpu_1_id=?,distro_id=?,distro_version=?,kernel=?,hypervisor=?,hypervisor_version=?,qemu_version=?,patches=?,notes=?,working=? where id = ?",
                  [$r->mobo_select,$r->cpu_select,$r->gpu_a_select,$r->gpu_b_select,$r->distro_select,$r->distro_version,$r->kernel_version,$r->hypervisor_select,$r->hypervisor_version,
                   $r->qemu_version,$r->patches,$r->notes,$work, $r->config_id]);
    }
    return $this->getConfigs();
  }

  public function getFilteredConfigs(Request $r){
    if($r->filter_cpu == "none" && $r->filter_host_gpu == "none" && $r->filter_distro == "none"){
      return $this->getConfigs();
    }

    $items = $this->getAllItems();
    $SQL = "select * from base_information where ";
    $SQL_ARGS = [];
    if ($r->filter_cpu != "none") {
      $SQL .= " cpu_id = ? AND";
      array_push($SQL_ARGS,$r->filter_cpu);
    }
    if ($r->filter_host_gpu != "none"){
      $SQL .= " host_gpu_id = ? AND";
      array_push($SQL_ARGS,$r->filter_host_gpu);
    }
    if ($r->filter_distro != "none"){
      $SQL .= " distro_id = ? AND";
      array_push($SQL_ARGS,$r->filter_distro);
    }

    $configs = DB::select(rtrim($SQL,"AND"), $SQL_ARGS);
    $items['configs'] = $configs;
    return view('known_configurations', $items );
  }



  //This is for grabbing all the database items, for use in a views related to configurations
  public function getAllItems(){
    $mobos = DB::select('select * from component_full where type = \'Motherboard\' order by name');
    $gpus = DB::select('select * from component_full where type = \'GPU\' order by name');
    $cpus = DB::select('select * from component_full where type = \'CPU\' order by name');
    $distros = DB::select('select * from distros order by name;');
    return [ 'mobos' => $mobos, 'gpus' => $gpus,
            'cpus' => $cpus, 'distros' => $distros];
  }
}
