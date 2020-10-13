<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Entities\Administrator;

class SyncController extends Controller
{
    public function __invoke()
    {
        Artisan::call('db:seed --class=PermissionsTableSeeder');
        return back();
    }
}
