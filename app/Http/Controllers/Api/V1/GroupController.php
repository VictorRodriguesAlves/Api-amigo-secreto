<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\CreateGroupRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function createGroup(CreateGroupRequest $request): JsonResponse
    {
        $created = Group::query()->create([
            'name' => $request->validated('group_name'),
        ]);

        return response()->json([
            'message' => 'Successfully created group!',
            'data' => $created
        ], 201);
    }

    public function addUser(AddUserRequest $request): JsonResponse
    {
        $user = User::query()->findOrFail($request->validated('user_id'));
        $user->group_id = $request->validated('group_id');
        $user->save();

        return response()->json([
            'message' => 'Successfully user added!',
            'data' => $user
        ], 201);
    }

}
