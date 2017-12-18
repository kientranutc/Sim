<?php
namespace App\Repositories\Sim;

use App\Models\Sim;
use App\Models\TypeSim;
class SimRepository implements  SimRepositoryInterface
{
    public function all()
    {

    }

    public function save($data)
    {
       $sim =new Sim();
       if(isset($data['name'])) {
           $sim->name = $data['name'];
       }else{
           $sim->name = '';
       }
       if(isset($data['price'])) {
           $sim->price = $data['price'];
       }else{
           $sim->price = 0;
       }
       if(isset($data['status'])) {
           $sim->status = $data['status'];
       }else{
           $sim->status = 0;
       }
       if(isset($data['first_number'])) {
           $sim->first_number = $data['first_number'];
       }else{
           $sim->first_number = 0;
       }
       if(isset($data['type_sim_id'])) {
           $sim->type_sim_id = $data['type_sim_id'];
       }else{
           $sim->type_sim_id = 0;
       }
       if(isset($data['type_sim_name'])) {
           $sim->type_sim_name = $data['type_sim_name'];
       }else{
           $sim->type_sim_name = 0;
       }
       if(isset($data['description'])) {
           $sim->description = $data['description'];
       }else{
           $sim->description = '';
       }
       $sim->save();
    }

    public function update($data, $id)
    {
        $sim = Sim::find($id);
        if($sim) {
            if(isset($data['name'])) {
                $sim->name = $data['name'];
            }else{
                $sim->name = '';
            }
            if(isset($data['price'])) {
                $sim->price = $data['price'];
            }else{
                $sim->price = 0;
            }
            if(isset($data['status'])) {
                $sim->status = $data['status'];
            }else{
                $sim->status = 0;
            }
            if(isset($data['first_number'])) {
                $sim->first_number = $data['first_number'];
            }else{
                $sim->first_number = 0;
            }
            if(isset($data['type_sim_id'])) {
                $sim->type_sim_id = $data['type_sim_id'];
            }else{
                $sim->type_sim_id = 0;
            }
            if(isset($data['type_sim_name'])) {
                $sim->type_sim_name = $data['type_sim_name'];
            }else{
                $sim->type_sim_name = 0;
            }
            if(isset($data['description'])) {
                $sim->description = $data['description'];
            }else{
                $sim->description = '';
            }
            return $sim->save();
        }else{
            return false;
        }

    }

    public function find($id)
    {
        return Sim::find($id);
    }

    public function delete($id)
    {
        $sim = Sim::find($id);
        if ($sim) {
            $sim->delete();
        }else{
            return false;
        }
    }

    public function findAttribute($attr, $name)
    {
        return Sim::where($attr, $name)->first();
    }

    public function checkExitsNameInUpdate($id, $name)
    {
        return  Sim::where('id','<>',$id)
        ->where('name', $name)
        ->count();
    }
    public function searchInListSim($net,$name ,$status, $limit)
    {
        $result = TypeSim::select('sim.*', 'sim.name as sim_name','type_sim.name as type_sim_name', 'net.name as net_name')
        ->join('net', 'net.id', '=', 'type_sim.net_id')
        ->join('sim', 'sim.type_sim_id', '=', 'type_sim.id');
        if($net!=-1){
             $result->where('net.id', $net);
        }
        if($name!=''){
            $result->where('sim.name','like', "%$name%");
        }
        if($status!=-1){
            $result->where('sim.status', $status);
        }
       return  $result->orderBy('sim.created_at', 'DESC')->paginate($limit);
    }
}

?>