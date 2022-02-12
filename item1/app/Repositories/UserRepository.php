<?php

namespace App\Repositories;

use App\Exceptions\UserException;
use App\Models\User;
use App\Repositories\Contracts\UserInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Fluent;

class UserRepository implements UserInterface
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return Collection
     */
    public function getAllUsers(): Collection
    {
        return $this->user->all();
    }

    /**
     * @param User $user
     * @return User
     */
    public function getUserById(User $user): User
    {
        return User::all()->where('id', $user->id)->first();
    }

    /**
     * @param Fluent $data
     * @return User
     */
    public function createUser(Fluent $data): User
    {
        try {

            DB::beginTransaction();

            $user = User::create([
                'name' => $data->get('name'),
                'login' => $data->get('userName'),
                'cep' => $data->get('zipCode'),
                'email' => $data->get('email'),
                'password' => Hash::make($data->get('password')),
            ]);

            DB::commit();

            return $user;

        } catch (UserException $exception) {
            dd($exception);
            DB::rollBack();

            return $exception;
        }
    }

    /**
     * @param User $user
     * @param Fluent $data
     * @return User
     */
    public function updateUser(User $user, Fluent $data): User
    {
        try {

            DB::beginTransaction();

            $user->verificaSenhaEstaPresente($data);

            $user->update([
                'name' => $data->get('name'),
                'login' => $data->get('userName'),
                'cep' => $data->get('zipCode'),
                'email' => $data->get('email'),
                'password' => $user->password,
            ]);

            DB::commit();

            return $user;

        } catch (Exception $exception) {
            DB::rollBack();

            return $exception;
        }
    }

    /**
     * @param User $user
     * @return User|Exception
     */
    public function deleteUser(User $user)
    {
        try {

            DB::beginTransaction();

            $user->delete();

            DB::commit();

            return $user;

        } catch (\Exception $exception) {
            DB::rollBack();

            return $exception;
        }
    }
}