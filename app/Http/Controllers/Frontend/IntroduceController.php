<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Introduce;

class IntroduceController extends Controller
{
    public function __construct(Introduce $introduce)
    {
        $this->introduce = $introduce;
    }
    public function index()
    {
        $dataIntroduce = $this->introduce->showIntroduce();
        return view('frontend.introduce', compact('dataIntroduce'));
    }
    //
}
