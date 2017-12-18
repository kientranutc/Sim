<?php
namespace  App\Repositories\Net;


use App\Models\Net;

class NetRepository implements  NetRepositoryInterface
{
    public function all()
    {
        return Net::All();
    }

    public function save($data)
    {
        $net = new Net();
        if(isset($data['name'])) {
            $net->name = $data['name'];
            $net->slug = str_slug( $data['name'], '-');
        } else {
            $net->name = '';
        }
        $net->save();
    }

    public function update($data, $id)
    {
        $net = Net::find($id);
        if($net) {
            if(isset($data['name'])) {
                $net->name = $data['name'];
                $net->slug = str_slug( $data['name'], '-');
            } else {
                $net->name = '';
            }
            return $net->save();
        }else{
            return false;
        }
    }

    public function find($id)
    {
        return Net::find($id);
    }

    public function findAttribute($attr, $name)
    {
        return Net::where($attr, $name);
    }

    public function delete($id)
    {
        $net = Net::find($id);
        if($net) {
            return $net->delete();
        }else{
             return false;
        }
    }
}


?>