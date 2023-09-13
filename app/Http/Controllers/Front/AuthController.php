<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->only([
            'email',
            'username',
            'full_name',
            'password',
            'password_confirmed'
        ]);

        $user = User::create($data);

        return $this->apiSuccess($user, 'Đăng ký thành công');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = $user->createToken('MyApp')->accessToken;

            return $this->apiSuccess([
                'user' => $user,
                'access_token' => $token,
            ],
                "Đăng nhập thành công");
        }

        return $this->apiUnauthorize("Đăng nhập thất bại, vui lòng thử lại");
    }
}
