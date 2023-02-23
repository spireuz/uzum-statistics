<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    public function respondWithData(?array $data): JsonResponse
    {
        return response()->json([
            'data' => $data
        ]);
    }
}
