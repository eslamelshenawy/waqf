<?php

namespace Modules\Admin\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;

class AdminController extends Controller
{

    public function updateContent(Request $request)
    {
        $page = Page::where('slug', $request['slug_type'])->first();
        $page->update([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        return \response()->json(true, 200);
    }


    public function index()
    {
        bread_crumb('Main');
        $admins = count(Administrator::all());
        return view('admin::index', ['adminsCount' => $admins]);
    }

    public function create()
    {
        return view('admin::create');
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('admin::show');
    }


    public function edit($id)
    {
        return view('admin::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
