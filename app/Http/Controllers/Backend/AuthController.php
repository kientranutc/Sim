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
        if (intval(session('countLogin')) == 5) {
            if (env('EMAIL_ADMIN') != $request->get('email')) {
                $this->user->lockAccount($request->get('email'));
                return redirect()->back()->withErrors('account lock');
            }
            return redirect()->back()->withErrors('error account');
        } else {
            $dataRequest = $request->only([
                    'email',
                    'password'
            ]);
            $dataFind = $this->user->findAttribute("email", $dataRequest['email']);
            if ($dataFind->active == 1) {
                if (Auth::attempt($dataRequest)) {
                    if (session()->has('countLogin')) {
                        session()->forget('countLogin');
                    }
                    return view('backend.index');
                } else {
                    if (session()->has('countLogin')) {
                        session([
                                'countLogin' => (session('countLogin') + 1)
                        ]);
                    } else {
                        session([
                                'countLogin' => 1
                        ]);
                    }
                    return redirect()->back()->withInput();
                }
            } else {
                return redirect()->back()->withErrors('account inactive');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
