<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
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
}
