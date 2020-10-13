<?php


namespace App\Repositories\Estate\Reservations;

use App\Estate;

interface ReservationsRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function getByIdWithTrashed(int $id);
    public function getByNumber(string $number);
    public function create(array $data);
    public function getWithImages(int $id);
    public function update(int $id, array $data);
    public function trashing(int $id);
    public function trashes();
    public function delete(int $id);
}
