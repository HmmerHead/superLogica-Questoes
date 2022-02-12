<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Support\Fluent;

interface UserInterface
{
    public function getAllUsers();
    public function getUserById(User $user);
    public function createUser(Fluent $data);
    public function updateUser(User $user, Fluent $data);
    public function deleteUser(User $user);
}