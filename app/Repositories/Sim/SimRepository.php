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
       if(isset($data['net_id'])) {
           $sim->net_id = $data['net_id'];
       }else{
           $sim->net_id = 0;
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
            if(isset($data['net_id'])) {
                $sim->net_id = $data['net_id'];
            }else{
                $sim->net_id = 0;
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
            return $sim->delete();
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
        $result = Sim::select('sim.*','net.name as net_name')
        ->join('net', 'net.id', '=', 'sim.net_id');
        if($net!=-1){
             $result->where('net.id','=', $net);
        }
        if($name!=''){
            $result->where('sim.name','like', "%$name%");
        }
        if($status!=-1){
            $result->where('sim.status', $status);
        }
       return  $result->orderBy('sim.created_at', 'DESC')->paginate($limit);
    }
    public function getPriceForNet($net)
    {
        $result =Sim::select('sim.price' )
        ->join('net', 'net.id', '=', 'sim.net_id')
        ->where('net.slug', $net);
        return  $result->orderBy('sim.created_at', 'ASC')->distinct()->get();
    }

    public function getListSimForNet($netSlug,$name, $typeSim, $price, $firstNumber, $limit)
    {
        $result = Sim::select('sim.*', 'net.name as net_name')
        ->join('net', 'net.id', '=', 'sim.net_id')
        ->where('net.slug', $netSlug);
        if($name!=''){
            $result->where('sim.name','like', "%$name%");
        }
        if($typeSim!=-1){
            $result->where('sim.type_sim_name',$typeSim);
        }
        if($price!=-1){
            $result->where('sim.price', $price);
        }
        if($firstNumber!=-1){
            $result->where('sim.first_number', $firstNumber);
        }
        return  $result->orderBy('sim.created_at', 'DESC')->paginate($limit);
    }
    public function getListSim($name, $net, $typeSim, $firstNumber, $limit)
    {
        $result = Sim::select('sim.*','net.name as net_name')
        ->join('net', 'net.id', '=', 'sim.net_id');
        if($name!=''){
            $result->where('sim.name','like', "%$name%");
        }
        if($typeSim!=-1){
            $result->where('sim.type_sim_name',$typeSim);
        }
        if($net!=-1){
            $result->where('net.id', $net);
        }
        if($firstNumber!=-1){
            $result->where('sim.first_number', $firstNumber);
        }
        return  $result->orderBy('sim.created_at', 'DESC')->paginate($limit);
    }
    public function getInfoSimWhenOrder($id)
    {
        return Sim::select('sim.*')
        ->where('sim.id', $id)
        ->first();
    }
}

?>