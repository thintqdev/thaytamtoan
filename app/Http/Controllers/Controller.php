<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiSuccess($data, $message)
    {
        return response()->json([
            'status' => true,
            'data' => $data,
            'messages' => $message,
        ], 200);
    }

    public function apiError($messages, $errors = [])
    {
        return response()->json([
            'status' => false,
            'messages' => $messages,
            'errors' => $errors
        ], 400);
    }

    public function apiUnauthorize($messages, $errors = [])
    {
        return response()->json([
            'status' => false,
            'messages' => $messages,
            'errors' => $errors
        ], 401);
    }
}
