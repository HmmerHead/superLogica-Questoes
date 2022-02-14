<?php

namespace App\Service\Api;

use App\Models\User;
use App\Repositories\Contracts\Api\UserApiInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

class UserApiService
{
    /**
     * @var UserApiInterface
     */
    protected $userApiRepository;

    /**
     * @param UserApiInterface $userApiRepository
     */
    public function __construct(UserApiInterface $userApiRepository)
    {
        $this->userApiRepository = $userApiRepository;
    }

    /**
     * @param Fluent $atributos
     * @return Collection
     */
    public function getAllUsers(Fluent $atributos): Collection
    {
        return $this->userApiRepository->getAllUsers($atributos);
    }

    /**
     * @param User $user
     * @return User
     */
    public function getUserById(User $user): Collection
    {
        return $this->userApiRepository->getUserById($user);
    }

    /**
     * @param Fluent $atributos
     * @return User
     */
    public function createUser(Fluent $atributos): User
    {
        return dd($this->userApiRepository->createUser($atributos));
    }

    /**
     * @param User $user
     * @param Fluent $atributos
     * @return User
     */
    public function updateUser(User $user, Fluent $atributos): User
    {
        return $this->userApiRepository->updateUser($user, $atributos);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user): bool
    {
        return $this->userApiRepository->deleteUser($user);
    }
}