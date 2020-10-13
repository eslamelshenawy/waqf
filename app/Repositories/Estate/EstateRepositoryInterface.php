<?php


namespace App\Repositories\Estate;

use App\Estate;

interface EstateRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function getBySlug(string $slug);
}
