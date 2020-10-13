<?php

namespace Modules\Admin\Http\Controllers\Api;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function updateContent(Request $request)
    {
        $page = Page::where('slug', $request->post('slug'))->first();
        $page->update([
            'content' => $request->post('content')
        ]);
        return \response()->json(true, 200);
    }
}
