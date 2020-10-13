<?php


namespace App\Repositories\User\Tenant;

interface TenantRepositoryInterface
{
    public function all();

    public function getCount();

    public function getById($id);

    public function getByEmail($email);

    public function create(array $data);

    public function update(int $id, array $data);

    public function getByIdWithTrashed(int $id): object;

    public function trashing(int $id): bool;

    public function trashes();

    public function delete(int $id): bool;

}
