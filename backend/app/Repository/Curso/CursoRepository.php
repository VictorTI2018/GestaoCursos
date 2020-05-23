<?php

namespace App\Repository\Curso;

use App\Curso;

class CursoRepository
{

    public function all(int $user_id): object
    {
        return (new Curso())
            ->query()
            ->where("user_id", $user_id)
            ->get();
    }

    public function find(string $key, string $value, int $user_id)
    {
        return (new Curso())
            ->query()
            ->where("{$key}", $value)
            ->where("user_id", $user_id)
            ->first();
    }

    public function insert(array $params): bool
    {
        $curso = (new Curso())->fill($params);
        return $curso->save();
    }
}
