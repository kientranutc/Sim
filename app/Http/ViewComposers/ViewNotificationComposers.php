<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Config;
use Illuminate\View\View;
use App\Repositories\Net\NetRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;

class ViewNotificationComposers
{
    /**
     * The export info repository implementation.
     *
     */
    protected $net;
    protected $news;
    /**
     * Create a new view notification composer.
     *
     * @param  ExportInfoRepositoryInterface  $exportInfo
     * @return void
     */
    public function __construct(NetRepositoryInterface $net, NewsRepositoryInterface $news)
    {
        // Dependencies automatically resolved by service container...
        $this->net = $net;
        $this->news =$news;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $netAll = $this->net->all();
        $newsStatus =  $this->news->newsStatus(1);
        $contact = Config::get('constant.contact');
        $view->with('netAll', $netAll)
             ->with('contact', $contact)
             ->with('newsStatus', $newsStatus);
    }
}