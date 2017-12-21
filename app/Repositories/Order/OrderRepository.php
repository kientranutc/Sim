<?php
namespace  App\Repositories\Order;
use App\Models\Order;
class OrderRepository implements  OrderRepositoryInterface
{
    public function all()
    {
        return Order::all();
    }

    public function save($data)
    {
        $order = new Order();
        if(isset($data['date_order'])){
            $order->date_order=$data['date_order'];
        }else{
            $order->date_order='';
        }
        if(isset($data['sim_id'])){
            $order->sim_id=$data['sim_id'];
        }else{
            $order->sim_id=0;
        }
        if(isset($data['customer_id'])){
            $order->customer_id=$data['customer_id'];
        }else{
            $order->customer_id=0;
        }
        if(isset($data['total'])){
            $order->total=$data['total'];
        }else{
            $order->total=0;
        }
        $order->status=0;
        $order->save();

    }

    public function update($data, $id)
    {
       $order =Order::find($id);
       if($order){
           if(isset($data['status'])) {
            if($data['status']==1){
                $order->status = 0;
            }else{
                $order->status = 1;
            }
           }
           return $order->save();
       }else{
           return false;
       }
    }

    public function find($id)
    {
        return Order::find($id);
    }
    public function listAndSearchOrder($name, $status, $limit)
    {
        $query = Order::select('order.*','sim.name as sim_name', 'customer.name as customer_name', 'customer.phone as customer_phone'
            , 'customer.cmnd as customer_cmnd', 'customer.address as customer_address')
        ->join('sim', 'sim.id', '=', 'order.sim_id')
        ->join('customer', 'customer.id', '=', 'order.customer_id');
        if($name != ''){
            $query->where('sim.name', 'like', "%$name%");
        }
        if($status !=-1){
            $query->where('order.status', $status);
        }
        return  $query->orderBy('order.created_at', 'DESC')->paginate($limit);

    }

    public function getOrderNew($limit)
    {
        return Order::select('order.*','sim.name as sim_name', 'customer.name as customer_name', 'customer.phone as customer_phone'
            , 'customer.cmnd as customer_cmnd', 'customer.address as customer_address')
            ->join('sim', 'sim.id', '=', 'order.sim_id')
            ->join('customer', 'customer.id', '=', 'order.customer_id')
            ->orderBy('order.date_order', 'DESC')
            ->take($limit)
            ->get();

    }

}
?>