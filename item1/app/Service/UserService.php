<?php

namespace App\Service;

use App\Models\User;
use App\Repositories\Contracts\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Fluent;

class UserService
{
    /**
     * @var UserInterface
     */
    protected $userRepository;

    /**
     * @param UserInterface $userRepository
     */
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return $this->userRepository->getAllUsers();
    }

    /**
     * @param User $user
     * @return User
     */
    public function getUserById(User $user): User
    {
        return $this->userRepository->getUserById($user);
    }

    /**
     * @param Fluent $atributos
     * @return User
     */
    public function createUser(Fluent $atributos): User
    {
        return $this->userRepository->createUser($atributos);
    }

    /**
     * @param User $user
     * @param Fluent $atributos
     * @return User
     */
    public function updateUser(User $user, Fluent $atributos): User
    {
        return $this->userRepository->updateUser($user, $atributos);
    }

    /**
     * @param User $user
     * @return User
     */
    public function deleteUser(User $user): User
    {
        return $this->userRepository->deleteUser($user);
    }
}