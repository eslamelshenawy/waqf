<?php


namespace App\Repositories\User\Agency;


interface AgencyRepositoryInterface
{
    public function all();
    public function pagination($perPage);
    public function getById(int $id): object;
    public function getByIdWithTrashed(int $id): object;
    public function getByEmail(string $email): object;
    public function search($service, $q);
    public function advancedSearch($service, $q, $perPage);
    public function create(array $data): object;
    public function update(array $data, int $id): object;
    public function update_status(array $data);
    public function getOrders(int $id);
    public function trashing(int $id): bool;
    public function trashes();
    public function filterByService(string $service);
}
