<?php
namespace App\Repositories\Customer;
use App\Models\Customer;
class CustomerRepository implements CustomerRepositoryInterface
{
    public function all()
    {
        return Customer::all();
    }

    public function save($data)
    {
        $customer =new Customer();
        if (isset($data['name'])) {
            $customer->name = $data['name'];
        } else {
            $customer->name = '';
        }
        if (isset($data['phone'])) {
            $customer->phone = $data['phone'];
        } else {
            $customer->phone = '';
        }
        if (isset($data['cmnd'])) {
            $customer->cmnd = $data['cmnd'];
        } else {
            $customer->cmnd = '';
        }
        if (isset($data['address'])) {
            $customer->address = $data['address'];
        } else {
            $customer->address = '';
        }
        $customer->save();
        return $customer->id;
    }

    public function update($data, $id)
    {

    }

    public function find($id)
    {
        return Customer::find($id);
    }

    public function delete($id)
    {

    }
}

?>