<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\TypeSim\TypeSimRepositoryInterface;
use App\Repositories\Net\NetRepositoryInterface;
use App\Http\Requests\CreateTypeSimRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateTypeSimRequest;
class TypeSimController extends Controller
{
    public function  __construct(TypeSimRepositoryInterface $typeSim, NetRepositoryInterface $net)
    {
        $this->typeSim = $typeSim;
        $this->net =$net;
    }

    public function index()
    {
        $stt=0;
        $dataTypeSim = $this->typeSim->all();
       return view('backend.typesim.index', compact('stt', 'dataTypeSim'));
    }

    public function create()
    {
        $dataNet = $this->net->all();
        return view('backend.typesim.create', compact('dataNet'));
    }

    public  function processCreateForm(CreateTypeSimRequest $request)
    {
        $dataRequest = $request->only(['name','net_id','image','description']);
        $this->typeSim->save($dataRequest);
        return Redirect::route('type-sim.index')->withSuccess('Thêm loại sim thành công.');
    }

    public function editForm($id)
    {
        $dataEdit = $this->typeSim->find($id);
        $dataNet = $this->net->all();
        return view('backend.typesim.update', compact('dataEdit', 'dataNet'));

    }

    public function processEditForm(UpdateTypeSimRequest $request, $id)
    {
        $dataRequest = $request->only(['name','net_id','image','description']);
        if($this->typeSim->checkExitsNameInUpdate($id, $dataRequest['name'])){
            return Redirect::route('type-sim.index')->withErrors('Tên loại sim đã tồn tại.');
        }else{
            if($this->typeSim->update($dataRequest, $id)){
                return Redirect::route('type-sim.index')->withSuccess('Cập nhật loại sim thành công.');
            }else{
                return Redirect::route('type-sim.index')->withErrors('Cập nhạt loại sim thất bại.');
            }
        }
    }

    public function delete($id)
    {
        if($this->typeSim->delete($id)){
            return Redirect::route('type-sim.index')->withSuccess('Xóa loại sim thành công.');
        }else{
            return Redirect::route('type-sim.index')->withErrors('Xóa loại sim thất bại.');
        }
    }
}
