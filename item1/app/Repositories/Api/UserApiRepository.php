<?php

namespace App\Repositories\Api;

use App\Models\User;
use App\Repositories\Contracts\Api\UserApiInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Fluent;

class UserApiRepository implements UserApiInterface
{
    const LIMIT = 10;
    const ORDER_DIRECTION = 'asc';
    const ORDER_FIELD = 'id';

    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function setTable(): Builder
    {
        $builder = DB::table($this->user->getTable());

        return $builder;
    }

    public function setFilter(Builder $builder, Fluent $data): Builder
    {
        if ($data->get('size')) {
            $builder = $builder->limit($data->get('size', self::LIMIT));
        }

        if ($data->get('order')) {

            $builder = $builder->orderBy(
                $data->get('order', self::ORDER_FIELD),
                $data->get('order_direction', self::ORDER_DIRECTION)
            );
        }

        return $builder;
    }

    /**
     * @param \Illuminate\Support\Fluent $data
     * @return \Illuminate\Support\Collection
     */
    public function getAllUsers(Fluent $data)
    {
        $builder = $this->setTable();
        $builder = $this->setFilter($builder, $data);

        return $builder->get();
    }

    public function getUserById(User $user)
    {
        $builder = $this->setTable();

        return $builder->where('id', $user->id)
            ->get();
    }

    public function createUser(Fluent $data)
    {
        $builder = $this->setTable();

        try {
            DB::beginTransaction();

            $builder->insert([
                'name' => $data->get('name'),
                'login' => $data->get('userName'),
                'cep' => $data->get('zipCode'),
                'email' => $data->get('email'),
                'password' => Hash::make($data->get('password')),
            ]);

            DB::commit();

            return $builder->latest()->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function updateUser(User $user, Fluent $data)
    {
        $builder = $this->setTable();

        try {
            DB::beginTransaction();

            $builder
                ->where('id', $user->id)
                ->update([
                    'name' => $data->get('name'),
                    'login' => $data->get('userName'),
                    'cep' => $data->get('zipCode'),
                    'email' => $data->get('email'),
                    'password' => $user->password,
                ]);

            DB::commit();

            return $builder->latest()->first();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }

    public function deleteUser(User $user): bool
    {
        $builder = $this->setTable();

        try {
            DB::beginTransaction();

            $builder
                ->where('id', $user->id)
                ->delete();

            DB::commit();

            return true;

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }
    }
}