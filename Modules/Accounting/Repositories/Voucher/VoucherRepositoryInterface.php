<?php

namespace Modules\Accounting\Repositories\Voucher;

interface VoucherRepositoryInterface
{
    public function all($voucher_type = null);
    public function getById(int $id);
    public function create(array $data);
    public function create_recipt(array $data);
    public function update(array $data,int $id);
    public function update_recipt(array $data,int $id);
}
