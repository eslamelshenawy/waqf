<?php


namespace App\Repositories\Estate\Land;

use App\Estate;

interface LandRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function trash(int $id);
    public function erase(int $id);
    public function activate(int $id);
    public function deactivate(int $id);
}
