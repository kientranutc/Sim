<?php
namespace  App\Repositories\Customer;

interface  CustomerRepositoryInterface
{
    public function all();

    public function save($data);

    public function update($data, $id);

    public function find($id);

    public function delete($id);
}