<?php

namespace Modules\Admin\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;

class PageController extends Controller
{
    public function index()
    {
        return view('admin::pages.index', ['pages' => Page::all()]);
    }

    public function edit(Page $page)
    {
        return view('admin::pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        
        $page = Page::where('slug', $request['slug_type'])->first();

        $pageUpdate = Page::find($page->id);
      $pageUpdate->title = $request['title'];
      $pageUpdate->content = $request['content'];
      $pageUpdate->save();
        
        // dd($request->all(),$pageUpdate);
        return redirect()->route('Admin::pages.index');

    }
}
