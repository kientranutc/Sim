<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use App\helper\Helper;
class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }

    public function index(Request $request)
    {
        $name = $request->get('name', '');
        $status = $request->get('status', -1);
        $limit =15;
        $stt = ($request->get('page',1)-1)*$limit;
        $dataOrder = $this->order->listAndSearchOrder($name, $status, $limit);
        return view('backend.order.index', compact('stt','dataOrder'));
    }

    public function updateStatusOrder($id, $status)
    {
        $data=[
          'status' => $status
        ];
        if($this->order->update($data, $id)) {
            return Redirect::route('order.index')->withSuccess('Cập nhật trạng thái đơn hàng thành công.');
        }else{
            return Redirect::route('order.index')->withErrors('Cập nhật trạng thái thất bại.');
        }

    }
}
