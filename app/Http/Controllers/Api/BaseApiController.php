<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    public function responseWithData(array $data): JsonResponse
    {
        return response()->json([
            'data' => $data
        ]);
    }
}
