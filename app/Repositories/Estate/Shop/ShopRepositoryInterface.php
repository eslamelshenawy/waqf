<?php


namespace App\Repositories\Estate\Shop;

use App\Estate;

interface ShopRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function trashing(int $id);
    public function trashes();
    public function delete(int $id);

}
