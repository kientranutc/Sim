<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Sim\SimRepositoryInterface;
use App\Repositories\TypeSim\TypeSimRepositoryInterface;
class CategoryController extends Controller
{
    public function __construct(SimRepositoryInterface $sim, TypeSimRepositoryInterface $typeSim)
    {
        $this->sim = $sim;
        $this->typeSim = $typeSim;
    }
    public function index(Request $request, $slug)
    {
        $name = $request->get('n', '');
        $typeSim = $request->get('l', -1);
        $price = $request->get('p', -1);
        $firstNumber = $request->get('d', -1);
        $limit=20;
        $dataTypeSim = $this->typeSim->getTypeSimForNet($slug);
        $dataCategory = $this ->sim->getListSimForNet($slug,$name, $typeSim, $price, $firstNumber, $limit);
        $priceSim = $this->sim->getPriceForNet($slug);
        return view('frontend.category', compact('priceSim','dataCategory','dataTypeSim'));
    }
}
