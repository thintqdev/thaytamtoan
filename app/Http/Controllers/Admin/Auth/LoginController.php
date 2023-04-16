<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function showLoginFormController()
    {
        return view('admin.auth.login');
    }

    public function LoginController(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            // TODO: Sử dụng session để làm SSO
            return redirect('admin/dashboard');
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }
}
