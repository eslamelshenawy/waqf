<?php


namespace App\Repositories\Estate\Apartment;

use App\Estate;

interface ApartmentRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function getByIdWithTrashed(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function trashing(int $id);
    public function trashes();
    public function delete(int $id);
}
