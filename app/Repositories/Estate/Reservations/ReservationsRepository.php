<?php

namespace App\Repositories\Estate\Reservations;

use App\Building;
use App\Estate;
use App\EstateOrder;
use App\Image;
use App\Traits\Uploader;
use App\Trash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ReservationsRepository implements ReservationsRepositoryInterface
{
    use Uploader;

    public function all()
    {
        return EstateOrder::with('madeBy','tenanter')->get();
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
