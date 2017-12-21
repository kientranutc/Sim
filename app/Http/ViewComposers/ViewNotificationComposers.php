<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;
use App\Repositories\Net\NetRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\helper\Helper;

class ViewNotificationComposers
{
    /**
     * The export info repository implementation.
     *
     */
    protected $net;
    protected $news;
    protected $order;
    /**
     * Create a new view notification composer.
     *
     * @param  ExportInfoRepositoryInterface  $exportInfo
     * @return void
     */
    public function __construct(NetRepositoryInterface $net, NewsRepositoryInterface $news, OrderRepositoryInterface $order)
    {
        // Dependencies automatically resolved by service container...
        $this->net = $net;
        $this->news =$news;
        $this->order = $order;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $helper =new Helper();
        $netAll = $this->net->all();
        $orderNew = $this->order->getOrderNew(5);
        $newsStatus =  $this->news->newsStatus(1);
        $contact = Config::get('constant.contact');
        $view->with('netAll', $netAll)
             ->with('contact', $contact)
             ->with('newsStatus', $newsStatus)
             ->with('helper', $helper)
             ->with('orderNew', $orderNew);
    }
}