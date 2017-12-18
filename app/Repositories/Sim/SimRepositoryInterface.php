<?php
namespace  App\Repositories\Sim;

interface SimRepositoryInterface{
    public function all();

    public function save($data);

    public function update($data, $id);

    public function find($id);

    public function delete($id);

    public function findAttribute($attr, $name);

    public function checkExitsNameInUpdate($id, $name);

    public function searchInListSim($net,$name ,$status, $limit);
}

?>