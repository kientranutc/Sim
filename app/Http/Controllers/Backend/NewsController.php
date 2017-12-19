<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Repositories\Net\NetRepositoryInterface;
use App\Repositories\News\NewsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    public function __construct(NewsRepositoryInterface $news, NetRepositoryInterface $net)
  {
        $this->news = $news;
        $this->net = $net;
   }
  public function index(Request $request)
  {
        $dataNet = $this->net->all();
        $title = $request->get('title', '');
        $net = $request->get('net', -1);
        $status = $request->get('status', -1);
        $limit =15;
        $stt = ($request->get('page',1)-1)*$limit;
        $dataNews = $this->news->searchAndListInNews($title, $net, $status, $limit);
        return view('backend.News.index', compact('stt', 'dataNews','dataNet'));
  }

  public function createForm()
  {
      $dataNet = $this->net->all();
      return view('backend.News.create', compact('dataNet'));
  }

  public function processCreateForm(CreateNewsRequest $request)
  {
        $dataRequest = $request->only(['title', 'image', 'net_id', 'status', 'description']);
        $this->news->save($dataRequest);
        return Redirect::route('news.index')->withSuccess('Thêm tin tức thành công.');
  }

  public function updateForm($id)
  {
      $dataNews = $this->news->find($id);
      $dataNet = $this->net->all();
      return view('backend.News.update', compact('dataNews', 'dataNet'));
  }
  public function processUpdateForm(UpdateNewsRequest $request, $id)
  {
      $dataRequest = $request->only(['title', 'image', 'net_id', 'status', 'description']);
      if($this->news->checkExitsNameInUpdate($id, $dataRequest['title'])){
          return redirect()->back()->withErrors('Bản tin đã tồn tại.');
      }else{
          if($this->news->update($dataRequest, $id)){
              return Redirect::route('news.index')->withSuccess('Cập nhật bản tin thành công.');
          }else{
              return Redirect::route('news.index')->withErrors('Cập nhật bản tin thất bại.');
          }
      }
  }
  public function delete($id)
  {

      if($this->news->delete($id)){
          return Redirect::route('news.index')->withSuccess('Xóa bản tin thành công.');
      }else{
          return Redirect::route('news.index')->withErrors('Xóa bản tin thất bại.');
      }
  }
}
