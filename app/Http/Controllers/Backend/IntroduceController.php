<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Introduce;
use App\Http\Requests\CreateIntroduceRequest;
use App\Http\Requests\UpdateIntroduceRequest;

class IntroduceController extends Controller
{
   public function __construct(Introduce $introduce)
   {
        $this->introduce = $introduce;
   }

   public function index()
   {
       $dataIntroduce = $this->introduce->getAll();
       $stt=0;
       return view('backend.introduce.index', compact('stt','dataIntroduce'));
   }
   public function createForm()
   {
       return view('backend.introduce.create');
   }

   public function processCreateForm(CreateIntroduceRequest $request)
   {
    $dataRequest = $request->only(['title', 'description']);
    $this->introduce->add($dataRequest);
    return Redirect::route('introduce.index')->withSuccess('Thêm giới thiệu gói cước thành công.');
   }

   public function delete($id)
   {
       if($this->introduce->deleteIntroduce($id)){
           return Redirect::route('introduce.index')->withSuccess('Xóa giới thiệu gói cước thành công.');
       }else{
           return Redirect::route('introduce.index')->withErrors('Xóa giới thiệu gói cước thất bại.');
       }
   }

   public function updateForm($id)
   {
       $dataEdit = $this->introduce->findIntroduce($id);
       return view('backend.introduce.update', compact('dataEdit'));
   }

   public function processUpdateForm(UpdateIntroduceRequest $request, $id)
   {
       $dataRequest = $request->only(['title', 'description']);

      if($this->introduce->updateIntroduce($dataRequest, $id)) {
          return Redirect::route('introduce.index')->withSuccess('cập nhật giới thiệu gói cước thành công.');
      } else {
          return Redirect::route('introduce.update',[$id])->withErrors('cập nhật giới thiệu gói cước thất bại.');
      }

   }

}
