<?php


namespace App\Repositories\User\Beneficiary;


interface BeneficiaryRepositoryInterface
{
    public function all();

    public function getCount(): int;

    public function getById($id): object;

    public function create(array $data): object;

    public function update(int $id, array $data): object;

    public function getByIdWithTrashed(int $id): object;

    public function trashing(int $id): bool;

    public function trashes();

    public function delete(int $id): bool;
}
