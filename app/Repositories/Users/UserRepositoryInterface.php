<?php
namespace  App\Repositories\Users;

interface  UserRepositoryInterface
{
  public function all();

  public function save($data);

  public function update($data, $id);

  public function find($id);

  public function findAttribute($attr, $name);

  public function lockAccount($email);
}

?>