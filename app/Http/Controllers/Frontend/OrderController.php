<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Sim\SimRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct(SimRepositoryInterface $sim, CustomerRepositoryInterface $customer, OrderRepositoryInterface $order)
    {
        $this->sim = $sim;
        $this->customer = $customer;
        $this->order = $order;
    }
    public function  index($id)
    {
        $dataSim = $this->sim->getInfoSimWhenOrder($id);
        return view('frontend.order', compact('dataSim'));
    }

    public function processOrder(Request $request)
    {
        $now =Carbon::now()->toDateTimeString();
        $dataRequestCustomer = $request->only(['name','phone', 'cmnd', 'address']);
        $customerId = $this->customer->save($dataRequestCustomer);
        $dataRequestOrder = $request->only(['total','sim_id']);
        $dataRequestOrder['date_order']=$now;
        $dataRequestOrder['customer_id']=$customerId;
        $this->order->save($dataRequestOrder);
        return redirect()->back()->withSuccess('Đặt hàng thành công! Xin vui lòng chờ nhân viên gọi lại.');

    }
    public function orderNow()
    {
        return view('frontend.order_now');
    }

    public function processOrderNow(Request $request)
    {
        $now =Carbon::now()->toDateTimeString();
        $dataRequestCustomer = $request->only(['name','phone', 'cmnd', 'address']);
        $customerId = $this->customer->save($dataRequestCustomer);
        $data['date_order']=$now;
        $data['customer_id']=$customerId;
        $this->order->save($data);
        return redirect()->back()->withSuccess('Đặt hàng thành công! Xin vui lòng chờ nhân viên gọi lại.');
    }
    //
}
