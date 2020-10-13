<?php

namespace App\Repositories\Estate;

use App\Estate;


class EstateRepository implements EstateRepositoryInterface
{

    public function all()
    {
        return Estate::all();
    }

    public function getById(int $id)
    {
        return Estate::find($id);
    }

    public function getBySlug(string $slug)
    {
        return Estate::whereSlug($slug)->first();
    }


}
