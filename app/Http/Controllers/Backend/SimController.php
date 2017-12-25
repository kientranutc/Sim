<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSimRequest;
use App\Repositories\Sim\SimRepositoryInterface;
use App\Repositories\TypeSim\TypeSimRepositoryInterface;
use App\Repositories\Net\NetRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateSimRequest;
use App\helper\Helper;


class SimController extends Controller
{
    public function __construct(TypeSimRepositoryInterface $typeSim, SimRepositoryInterface $sim, NetRepositoryInterface $net)
    {
        $this->net =$net;
        $this->typeSim = $typeSim;
        $this->sim = $sim;

    }
    public function index(Request $request)
    {
        $limit =15;
        $helper = new Helper();
        $net = $request->get('net', -1);
        $name = $request->get('name', '');
        $status = $request->get('status', '-1');
        $stt = ($request->get('page', 1)-1)*$limit;
        $dataNet = $this->net->all();
        $dataSim = $this->sim->searchInListSim($net, $name, $status, $limit);
        return view('backend.sim.index', compact('stt', 'dataSim','dataNet','helper'));
    }

    public function createForm()
    {
        $dataTypeSim = $this->net->all();

        return view('backend.sim.create', compact('dataTypeSim'));
    }
    public function processCreateForm(CreateSimRequest $request)
    {
           $dataRequest = $request->only(['name','price','status','first_number','net_id', 'type_sim_name', 'description']);
           $this->sim->save($dataRequest);
           return Redirect::route('sim.index')->withSuccess('Thêm sim thành công.');
    }

    public function updateForm($id)
    {
        $dataTypeSim = $this->net->all();
        $dataEdit = $this->sim->find($id);
        return view('backend.sim.update', compact('dataTypeSim', 'dataEdit'));
    }

    public function processUpdateForm(UpdateSimRequest $request, $id)
    {
        $dataRequest = $request->only(['name','price','status','first_number','net_id', 'type_sim_name', 'description']);
        if($this->sim->checkExitsNameInUpdate($id, $dataRequest['name'])){
            return redirect()->back()->withErrors('Số sim đã tồn tại.');
        }else{
            if($this->sim->update($dataRequest, $id)){
                return Redirect::route('sim.index')->withSuccess('Cập nhật số sim thành công.');
            }else{
                return Redirect::route('sim.index')->withErrors('Cập nhật số sim thất bại.');
            }
        }
    }

    public function delete($id)
    {
        if($this->sim->delete($id)){
            return Redirect::route('sim.index')->withSuccess('Xóa sim thành công.');
        }else{
            return Redirect::route('sim.index')->withErrors('Xóa sim thất bại.');
        }
    }

}
