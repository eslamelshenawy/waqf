<?php

namespace Modules\Admin\Http\Controllers;

use App\Building;
use App\GenerallSetting;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;
use App\Traits\Uploader;

class SettingController extends Controller
{

    use Uploader;

    public function index()
    {
        return view('admin::settings.edit',['setting'=>GenerallSetting::find(1)]);
    }

    public function create()
    {
        return view('admin::create');
    }


    public function store(Request $request)
    {
        $setting = GenerallSetting::find(1);
        $GenerallSetting =  $setting->update([
            'site_title_ar' => $request->data['site_title_ar'],
            'email' => $request->data['site_email'],
            'site_mobile' => $request->data['site_mobile'],
            'site_phone' => $request->data['site_phone'],
            'facebook_url' => $request->data['facebook_url'],
            'twitter_url' => $request->data['twitter_url'],
            'instagram' => $request->data['instagram'],
            'site_whatup' => $request->data['site_whatup'],
            'site_aboutus_ar' => $request->data['site_aboutus_ar'],
            'site_addresse_ar' => $request->data['site_addresse_ar'],
            'playStoreLink' => $request->data['playStoreLink'],
            'aplleStoreLink' => $request->data['aplleStoreLink'],
        ]);

        return redirect()->back()->with('success', 'Success Modification');
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
