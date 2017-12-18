<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Net\NetRepositoryInterface;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateNetRequest;
use App\Http\Requests\UpdateNetRequest;

class NetController extends Controller
{
    public function __construct(NetRepositoryInterface $net)
    {
        $this->net = $net;
    }

    public function index()
    {
       $dataNet = $this->net->all();
       $stt=0;
       return view('backend.net.index',compact('stt','dataNet'));
    }

    public function createForm()
    {
        return view('backend.net.create');
    }

    public function processCreateForm(CreateNetRequest $request)
    {
        $dataRequest = $request->only('name');

        $this->net->save($dataRequest);
        return Redirect::route('net.index')->withSuccess('Thêm nhà mạng thành công.');
    }

    public function delete($id)
    {
        if($this->net->delete($id)){
            return Redirect::route('net.index')->withSuccess('Xóa nhà mạng thành công.');
        }else{
            return Redirect::route('net.index')->withErrors('Xóa nhà mạng thất bại.');
        }
    }

    public function editForm($id)
    {
        $data=$this->net->find($id);
        return view('backend.net.update', compact('data'));
    }

    public function processEditForm(UpdateNetRequest $request, $id)
    {
         $dataRequest = $request->only('name');
         if($this->net->update($dataRequest, $id)) {
             return Redirect::route('net.index')->withSuccess('Cập nhật nhà mạng thành công.');
         }else{
             return Redirect::route('net.index')->withErrors('Cập nhật nhà mạng thất bại.');
         }

    }
}
