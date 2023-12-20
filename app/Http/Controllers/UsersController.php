<?php

namespace App\Http\Controllers;

use App\Exceptions\RaiseException;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{

    /**
     * @throws RaiseException
     */
    public function getUsers(): mixed
    {
        if (!$users = User::with('profile')->get())
            throw new RaiseException(
                message: 'Users are not found',
                status: Response::HTTP_NOT_FOUND
            );

        return UserResource::collection($users);
    }

    /**
     * @throws RaiseException
     */
    public function getUser(int $userId): mixed
    {
        if (!$user = User::with('profile')->find($userId))
            throw new RaiseException(
                message: "User ($userId) not found",
                status: Response::HTTP_NOT_FOUND
            );

        return UserResource::make($user);
    }

    /**
     * @throws RaiseException
     */
    public function getUserProfile(int $userId): mixed
    {
        if (!$userProfile = Profile::whereUserId($userId)->first())
            throw new RaiseException(
                message: "User ($userId) profile not found",
                status: Response::HTTP_NOT_FOUND
            );

        return ProfileResource::make($userProfile);
    }

    /**
     * @throws RaiseException
     */
    public function updateUserProfile(ProfileRequest $request, int $userId): mixed
    {
        if (!$userProfile = User::whereId($userId)->first())
            throw new RaiseException(
                message: "User ($userId) not found",
                status: Response::HTTP_NOT_FOUND
            );

        $userProfile->profile()->updateOrCreate($request->all());

        return response()->json([
            'data' => [
                'message' => 'User profile updated'
            ]
        ]);
    }
}
