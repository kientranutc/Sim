<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected  $table ="introduce";

    public function getAll()
    {
        Return Introduce::all();
    }
    public function add($data)
    {
      $introduce =new Introduce();
      if (isset($data['title'])){
          $introduce -> title = $data['title'];
      } else {
          $introduce -> title = '';
      }
      if (isset($data['description'])){
          $introduce -> description = $data['description'];
      } else {
          $introduce -> description = '';
      }
      $introduce->save();
    }
    public function updateIntroduce($data, $id)
    {
        $introduce =Introduce::find($id);
        if ($introduce) {
        if (isset($data['title'])){
            $introduce -> title = $data['title'];
        } else {
            $introduce -> title = '';
        }
        if (isset($data['description'])){
            $introduce -> description = $data['description'];
        } else {
            $introduce -> description = '';
        }
            return $introduce->save();
        }else{
            return false;
        }
    }
    public function findIntroduce($id)
    {
        return Introduce::find($id);
    }

    public function deleteIntroduce($id)
    {
        $introduce = Introduce::find($id);
        if ($introduce) {
            return $introduce->delete($id);
        } else {
            return false;
        }
    }

    /**
     * frontend
     */

    public function showIntroduce()
    {
        return Introduce::orderBy('introduce.created_at', 'DESC')
        ->orderBy('introduce.updated_at', 'DESC')
        ->first();
    }
}
