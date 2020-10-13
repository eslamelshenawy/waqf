<?php


namespace Modules\Accounting\Repositories\Invoice;


interface InvoiceRepositoryInterface
{
    public function all();
    public function getById(int $id);
    public function create(array $data);
    public function update(array $data,$id);
}
