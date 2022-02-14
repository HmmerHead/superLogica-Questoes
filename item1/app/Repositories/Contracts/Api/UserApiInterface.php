<?php

namespace App\Repositories\Contracts\Api;

use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Fluent;

interface UserApiInterface
{
    public function setTable();
    public function setFilter(Builder $builder, Fluent $data);
    public function getAllUsers(Fluent $data);
    public function getUserById(User $user);
    public function createUser(Fluent $data);
    public function updateUser(User $user, Fluent $data);
    public function deleteUser(User $user);
}