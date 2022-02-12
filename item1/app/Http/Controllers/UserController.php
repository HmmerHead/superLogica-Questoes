<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPutResquest;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use App\Service\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Fluent;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('list', ['users' => $this->userService->getAllUsers()]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param  UserPostRequest $request
     * @return RedirectResponse
     */
    public function store(UserPostRequest $request)
    {
        $userRequest = new Fluent($request->all());

        $this->userService->createUser($userRequest);

        return redirect()->route('user.index');
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('edit', ['users' => $this->userService->getUserById($user)]);
    }

    /**
     * @param  UserPutResquest $request
     * @param User $user
     * @return Response
     */
    public function update(UserPutResquest $request, User $user): Response
    {
        Validator::make($request->all(), [
            'password' => ['sometimes' , Password::min(8)->numbers()->letters()]
        ]);

        $userRequest = new Fluent($request->all());

        $this->userService->updateUser($user, $userRequest);

        return redirect()->route('user.index');
    }

    /**
     * @param User $user
     * @return Response
     */
    public function delete(User $user)
    {
        $this->userService->deleteUser($user);

        return redirect()->route('user.index');
    }
}
