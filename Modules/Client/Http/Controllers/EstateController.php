<?php

namespace Modules\Client\Http\Controllers;

use App\Repositories\Estate\EstateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class EstateController extends Controller
{

    protected $estate;

    public function __construct(EstateRepositoryInterface $estate)
    {
        $this->middleware('auth:beneficiary')->except('logout')->except(['index', 'show']);
        $this->estate = $estate;
    }

    public function index()
    {
        bread_crumb_3d($previous = null, $current = ['name' => 'الاعلانات العقارية', 'url' => route('estate.index')]);
        return view('client::estates.index', ['estates' => $this->estate->all()]);
    }

    public function show($slug)
    {
        bread_crumb_3d($previous = ['name' => 'الاعلانات العقارية', 'url' => route('estate.index')],
            $current = ['name' => 'التفاصيل', 'url' => null]);
        return view('client::estates.show', ['estate' => $this->estate->getBySlug($slug)]);
    }

    public function create()
    {
        bread_crumb_3d($previous = null, $current = ['name' => 'اضافة عقار', 'url' => null]);
        return view('client::estates.create');
    }

}
