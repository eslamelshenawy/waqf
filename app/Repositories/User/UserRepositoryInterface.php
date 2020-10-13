<?php


namespace App\Repositories\User;

use App\User;

interface UserRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function getByType(string $type);
}
