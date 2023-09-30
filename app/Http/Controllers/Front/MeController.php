<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\UpdateMeRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            DB::beginTransaction();
            $user->update($userData);
            $account->update($accountData);
            DB::commit();

            return $this->apiSuccess(true, 'Cập nhật thông tin thành công');
        } catch (\Exception $e) {
            DB::rollback();
            \Log::debug('Error:', [$e->getMessage()]);

            return $this->apiError("Cập nhật thất bại");
        }
    }
}
