<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGroupRequest;
use App\Models\Group;
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

}
