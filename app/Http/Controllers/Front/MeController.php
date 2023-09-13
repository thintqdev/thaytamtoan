<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\UpdateMeRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MeController extends Controller
{
    public function getMe()
    {
        $userId = Auth::user()->id;

        $user = User::with('account')->where('id', $userId)->firstOrFail();
        return $this->apiSuccess($user, "Thành công");
    }

    public function updateMe(UpdateMeRequest $request)
    {
        $userId = Auth::user()->id;

        $user = User::where('id', $userId)->firstOrFail();
        $userData = $request->only('full_name', 'username');
        $accountData = $request->except('full_name', 'username');
        $account = Account::where('user_id', $user->id)->firstOrFail();

        try {
            $user->update($userData);
            $account->update($accountData);

            return $this->apiSuccess(true, 'Cập nhật thông tin thành công');
        } catch (\Exception $e) {
            \Log::debug('Error:', [$e->getMessage()]);

            return $this->apiError("Cập nhật thất bại");
        }


    }
}
