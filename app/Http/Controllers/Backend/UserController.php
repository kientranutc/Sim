<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        $email = $request->get('email','');
        $active = $request->get('active',-1);
        $stt = ($request->get('page',1)-1)*10;
        $dataUser = $this->user->ListInSearchUser($email, $active, 15);
        return view('backend.users.index', compact('stt', 'dataUser'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function processCreateUser(CreateUserRequest $request)
    {
        $dataRequest = $request->only(['name','fullname', 'email', 'password']);
        $this->user->save($dataRequest);
        return Redirect::route('users.index')->withSuccess('Add new user successfully');
    }

    public function lockAndUnlockUser($id, $active)
    {
        if ($this->user->lockAndUnlock($id)) {
            if($active==1){
                 return Redirect::back()->withSuccess('Unlock successfully');
            }else{
                return Redirect::back()->withSuccess('lock successfully');
            }
        }else{
            return Redirect::back()->withErrors('User is not exists');
        }
    }

    public function editProfile()
    {
        return view('backend.users.edit');
    }

    public function processEditProfile(EditProfileRequest $request)
    {
       $dataRequest = $request->only(['name', 'fullname', 'password']);
       $userId = Auth::user()->id;
       if($this->user->update($dataRequest, $userId)) {
           return Redirect::back()->withSuccess('Cập nhật thành công');
       } else {
           return Redirect::back()->withErrors('Cập nhật thất bại');
       }
    }
}
