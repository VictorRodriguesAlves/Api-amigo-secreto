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

    public function getMatch(User $user): JsonResponse
    {
        if(is_null($user->friend_id)){
            return response()->json([
                'message' => 'No match available for the user at this time.',
                'data' => []
            ]);
        }

        $match = User::query()->findOrFail($user->friend_id);

        return response()->json([
            'message' => 'Successfully fetched match.',
            'data' => [
                'user_name' => $user->name,
                'match_name' => $match->name,
            ]
        ]);
    }

}
