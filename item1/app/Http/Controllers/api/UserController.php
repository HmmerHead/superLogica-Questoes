<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Service\Api\UserApiService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Fluent;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userApiService;

    /**
     * @param UserApiService $userApiService
     */
    public function __construct(UserApiService $userApiService)
    {
        $this->userApiService = $userApiService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $userRequest = new Fluent($request->all());

        $user =  $this->userApiService->getAllUsers($userRequest);

        return UserResource::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserPostRequest $request
     * @return User
     */
    public function store(Request $request)
    {
        $userRequest = new Fluent($request->all());

        return $this->userApiService->createUser($userRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return AnonymousResourceCollection
     */
    public function show(User $user)
    {
        $user = $this->userApiService->getUserById($user);

        return UserResource::collection($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return User
     */
    public function update(Request $request, User $user)
    {
        $userRequest = new Fluent($request->all());

        return $this->userApiService->updateUser($user, $userRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return User
     */
    public function destroy(User $user)
    {
        return $this->userApiService->deleteUser($user);
    }
}
