<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Repositories\User\UserContract;

class AuthenticationController extends Controller
{
    protected $userModel;
    public function __construct(UserContract $userContract) {
        $this->userModel = $userContract;
    }

    public function login() {
        return view('authentication.login');
    }

    public function doLogin(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $result = $this->userModel->authenticate($request);
        if ($result['status'] == 'success') {
            if (Auth::user()->user_type == 'admin') {
                return redirect()->route('farmer_index');
            } else {
                return redirect()->route('new_farmer');
            }
        } else {
            return back()->withInput()->with('error', $result['error']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
