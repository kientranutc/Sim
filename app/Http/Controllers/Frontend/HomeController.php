<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Net\NetRepositoryInterface;
use App\Repositories\Sim\SimRepositoryInterface;
use App\Repositories\TypeSim\TypeSimRepositoryInterface;

class HomeController extends Controller
{
    public function __construct(NetRepositoryInterface $net, SimRepositoryInterface $sim, TypeSimRepositoryInterface $typeSim)
    {
        $this->net = $net;
        $this->sim = $sim;
        $this->typeSim = $typeSim;
    }
    public function index(Request $request)
    {
        $name = $request->get('n', '');
        $net = $request->get('net', -1);
        $typeSim = $request->get('l', -1);
        $firstNumber = $request->get('d', -1);
        $limit=15;
        $dataNet = $this->net->all();
        $dataTypeSim = $this->typeSim->getAllTypeSim();
        $dataSim  =$this->sim->getListSim($name, $net, $typeSim, $firstNumber, $limit);
        return view('frontend.home', compact('dataNet','dataSim','dataTypeSim'));
    }

}
