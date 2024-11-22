<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function createUser(CreateUserRequest $request): JsonResponse
    {
        $created = User::query()->create([
            'name' => $request->validated('user_name'),
        ]);

        return response()->json([
            'message' => 'Successfully created user.',
            'data' => $created
        ], 201);
    }

}
