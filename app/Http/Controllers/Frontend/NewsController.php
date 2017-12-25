<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use App\helper\Helper;

class NewsController extends Controller
{
    public function __construct(NewsRepositoryInterface $news)
    {
        $this->news = $news;
    }
    public function index()
    {
        $limit=15;
        $helper = new Helper();
        $showNews = $this->news->showNews($limit);
        return view('frontend.news', compact('showNews', 'helper'));
    }
    public function showDetail($slug)
    {
        $helper = new Helper();
        $newsDetail = $this->news->findAttribute('slug', $slug);
        return view('frontend.news-detail', compact('newsDetail', 'helper'));
    }
    //
}
