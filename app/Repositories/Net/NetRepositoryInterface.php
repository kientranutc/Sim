<?php
namespace  App\Repositories\Net;

interface  NetRepositoryInterface
{
  public function all();

  public function save($data);

  public function update($data, $id);

  public function find($id);

  public function delete($id);

  public function findAttribute($attr, $name);

}

?>