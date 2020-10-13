<?php


namespace App\Repositories\User\Advance;

use App\Advance;
use App\Beneficiary;
use App\Building;
use App\EstateOrder;
use App\Kid;
use App\Traits\Uploader;
use App\Trash;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdvanceRepository implements AdvanceRepositoryInterface
{
    use Uploader;

    public function all()
    {
        return Advance::get();
    }

    public function getById(int $id)
    {
        return Building::find($id);
    }

    public function getByNumber(string $number)
    {
    }

    public function create(array $data)
    {
    }

    public function getWithImages($id){

    }

    public function update(int $id, array $data)
    {

    }

    public function getByIdWithTrashed(int $id)
    {

    }

    public function trashing(int $id)
    {

    }

    public function trashes()
    {
    }

    public function delete(int $id)
    {
    }

}
