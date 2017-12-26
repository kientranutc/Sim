<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Repositories\Users\UserRepositoryInterface;

class AuthController extends Controller
{

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('login');
    }

    public function processLogin(LoginRequest $request)
    {
            $dataRequest = $request->only([
                    'email',
                    'password'
            ]);
            $dataFind = $this->user->findAttribute("email", $dataRequest['email']);
            if( $dataFind) {
                if ($dataFind->active == 1) {
                    if (Auth::attempt($dataRequest)) {
                        return view('backend.index');
                    } else {

                        return redirect()->back()->withInput()->withErrors('Lỗi đăng nhập.');
                    }
                } else {
                    return redirect()->back()->withInput()->withErrors('Tài khoản đã bị khóa');
                }
            } else {
                return redirect()->back()->withInput()->withErrors('Email chưa tồn tại.');
            }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
