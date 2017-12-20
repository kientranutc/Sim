<?php
namespace  App\Repositories\Order;

interface  OrderRepositoryInterface
{
  public function all();

  public function save($data);

  public function update($data, $id);

  public function find($id);

  public function delete($id);

  public function listAndSearchOrder($name, $status, $limit);
}