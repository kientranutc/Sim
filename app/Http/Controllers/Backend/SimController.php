<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSimRequest;
use App\Repositories\Sim\SimRepositoryInterface;
use App\Repositories\TypeSim\TypeSimRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class SimController extends Controller
{
    public function __construct(TypeSimRepositoryInterface $typeSim, SimRepositoryInterface $sim)
    {
        $this->typeSim = $typeSim;
        $this->sim = $sim;
    }
    public function index(Request $request)
    {

        $net = $request->get('status', -1);
        $name = $request->get('name', '');
        $status = $request->get('status', '-1');
        $stt = ($request->get('page', 1)-1)*15;
        $dataSim = $this->sim->searchInListSim($net, $name, $status, 15);
        return view('backend.sim.index', compact('stt', 'dataSim'));
    }

    public function createForm()
    {
        $dataTypeSim = $this->typeSim->all();

        return view('backend.sim.create', compact('dataTypeSim'));
    }
    public function processCreateForm(CreateSimRequest $request)
    {
           $dataRequest = $request->only(['name','price','status','first_number','type_sim_id', 'type_sim_name', 'description']);
           $this->sim->save($dataRequest);
           return Redirect::route('sim.index')->withSuccess('Thêm sim thành công.');
    }

}
