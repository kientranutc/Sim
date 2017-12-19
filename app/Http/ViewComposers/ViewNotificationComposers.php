<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Net\NetRepositoryInterface;

class ViewNotificationComposers
{
    /**
     * The export info repository implementation.
     *
     */
    protected $net;
    /**
     * Create a new view notification composer.
     *
     * @param  ExportInfoRepositoryInterface  $exportInfo
     * @return void
     */
    public function __construct(NetRepositoryInterface $net)
    {
        // Dependencies automatically resolved by service container...
        $this->net = $net;
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

        $view->with('netAll', $netAll);
    }
}