<?php

namespace Modules\Admin\Http\Controllers\Administrators;

use App\Agency;
use App\ContactUs;
use App\Inquiry;
use Modules\Admin\Entities\Administrator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\StoreAdministrator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdministratorController extends Controller
{

    public function index()
    {
        bread_crumb('Administrators');
        $administrators = Administrator::all();
        return view('admin::administrators.index', compact('administrators'));
    }
    public function Inquiry()
    {
        bread_crumb('الاستفسارات');
        $Inquiry = Inquiry::all();
        return view('admin::users.tenants.Inquiry', compact('Inquiry'));
    }
    
    public function contactus()
    {
        bread_crumb('اتصل بنا');
        $Inquiry = ContactUs::all();
        return view('admin::users.tenants.contactus', compact('Inquiry'));
    }


    public function create()
    {
        bread_crumb('Administrators | New');
        return view('admin::administrators.create');
    }


    public function store(StoreAdministrator $request)
    {
        $validated = $request->validated();

        $role = Role::findById($request->post('role_id'), 'admin');

        $administrator = Administrator::create($request->except(['_token', 'password_confirmation', 'role_id']));
//            dd($administrator);
        if($administrator && $role){
            $administrator->assignRole($role);
        }

        session()->flash('success');

        return redirect(route('Admin::administrators.index'));

    }

    public function show($id)
    {
        return view('admin::administrators.show');
    }


    public function edit($id)
    {
        bread_crumb('Administrators | Edit');
        return view('admin::administrators.edit',['admin'=> Administrator::with('roles')->find($id),'roles'=> Role::all()]);
    }


    public function update(Request $request, $id)
    {
        $rol = Administrator::with('roles')->where('id',$id)->first();

        if($request->post('role_id')){
            if(@$rol['roles'][0]['pivot']){
                $roe=$rol['roles'][0]['pivot']->delete();
            }
            $role = Role::findById($request->post('role_id'), 'admin');
        }else{
            $role=$rol['roles'][0];
        }

        $administrator= Administrator::find($id)->update([
            'is_active' => $request->has('is_active')
        ]);


        if($request->username){
            Administrator::find($id)->update([
                'name' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
        }

        if(Administrator::find($id) && $role){
            Administrator::find($id)->assignRole($role);
        }
        session()->flash('success');
        return redirect(route('Admin::administrators.index'));
    }


    public function destroy($id)
    {
        $administrator = Administrator::destroy($id);
        return back();

    }
}
