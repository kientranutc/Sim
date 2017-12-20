<?php
namespace  App\Repositories\TypeSim;
use App\Models\TypeSim;

class TypeSimRepository implements TypeSimRepositoryInterface
{
    public function all()
    {
      return TypeSim::select('type_sim.*','net.name as net_name')
      ->join('net', 'net.id', '=', 'type_sim.net_id')
      ->orderBy('type_sim.created_at', 'DESC')
      ->get();
    }

    public function save($data)
    {
        $typeSim = new TypeSim();
        if (isset($data['name'])) {
            $typeSim->name = $data['name'];
            $typeSim->slug = str_slug($data['name']);
        }else{
            $typeSim->name = '';
        }
        if(isset($data['image'])) {
            $typeSim->image = $data['image'];
        }else{
            $typeSim->image = '';
        }
        if(isset($data['net_id'])) {
            $typeSim->net_id = $data['net_id'];
        }else{
            $typeSim->net_id = '';
        }
        if(isset($data['description'])) {
            $typeSim->description = $data['description'];
        }else{
            $typeSim->description = '';
        }
        $typeSim->save();
    }

    public function update($data, $id)
    {
        $typeSim =TypeSim::find($id);
        if($typeSim) {
            if (isset($data['name'])) {
                $typeSim->name = $data['name'];
                $typeSim->slug = str_slug($data['name']);
            }else{
                $typeSim->name = '';
            }
            if(isset($data['image'])) {
                $typeSim->image = $data['image'];
            }else{
                $typeSim->image = '';
            }
            if(isset($data['net_id'])) {
                $typeSim->net_id = $data['net_id'];
            }else{
                $typeSim->net_id = '';
            }
            if(isset($data['description'])) {
                $typeSim->description = $data['description'];
            }else{
                $typeSim->description = '';
            }
            return $typeSim->save();
      } else {
          return false;
      }
    }

    public function find($id)
    {
        return TypeSim::find($id);
    }

    public function delete($id)
    {
        $typeSim = TypeSim::find($id);
        if($typeSim) {
            return $typeSim->delete();
        }else{
            return false;
        }
    }

    public function findAttribute($attr, $name)
    {
        return TypeSim::where($attr, $name)->first();
    }

    public function checkExitsNameInUpdate($id, $name)
    {
        return TypeSim::where('id','<>',$id)
                    ->where('name', $name)
                    ->count();
    }

    public function getAllTypeSim()
    {
        return TypeSim::all();
    }
    public function getTypeSimForNet($net)
    {
        return TypeSim::select('type_sim.*','net.name as net_name')
        ->join('net', 'net.id', '=', 'type_sim.net_id')
        ->where('net.slug', $net)
        ->get();
    }

}


?>