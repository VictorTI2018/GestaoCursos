<?php

namespace App\Repository\User;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    public function findByKey(string $field, string $value): object
    {
        return (new User())->query()
            ->where("{$field}", $value)
            ->first();
    }

    public function insert(array $params): bool
    {
        $params['password'] = Hash::make($params['password']);
        $user = (new User())->fill($params);
        return $user->save();
    }

    public function edit(int $id, array $params): bool
    {
        $user = $this->findByKey("id,", $id);
        return $user->update($params);
    }
}
