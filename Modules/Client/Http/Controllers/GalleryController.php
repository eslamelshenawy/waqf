<?php

namespace Modules\Client\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class GalleryController extends Controller
{

    public function __invoke()
    {
        session()->forget('previous');
        bread_crumb_3d($previous = null, $current = ['name' => 'معرض الصور', 'url' => null]);
        return view('client::gallery.index');
    }

}
