<?php

namespace Modules\Client\Http\Controllers;

use App\Repositories\Estate\EstateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LabController extends Controller
{

    protected $estate;
    public function __construct(EstateRepositoryInterface $estate)
    {
        $this->estate = $estate;
    }

    public function index()
    {
        $estates = $this->estate->all();
        return view('client::lab.index', compact('estates'));
    }
}