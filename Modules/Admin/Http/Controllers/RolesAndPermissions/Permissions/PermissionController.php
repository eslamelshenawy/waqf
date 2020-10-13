<?php

namespace Modules\Admin\Http\Controllers\RolesAndPermissions\Permissions;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Http\Requests\StorePermission;
use \Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AdminLogin;


class PermissionController extends Controller
{

    const GUARD = 'admin';

    public function index()
    {
        bread_crumb('Roles and Permissions | Permissions');
        $permissions = DB::table('permissions')->get();
        return view('admin::roles_and_permissions.permissions.index', compact('permissions'));
    }

    public function show()
    {

    }

    public function create()
    {
        bread_crumb('Roles and Permissions | Permissions | New');
        return view('admin::roles_and_permissions.permissions.create');
    }

    public function store(StorePermission $request)
    {

        $validated = $request->validated();

        Permission::create([
            'guard_name' => self::GUARD,
            'name' => $request->post('name')
        ]);

        session()->flash('success');

        return redirect()->route('Admin::permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::findById($id, self::GUARD);
        return view('admin::roles_and_permissions.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findById($id, self::GUARD);
        $permission->update([
            'name' => $request->post('name')
        ]);

        session()->flash('success');

        return redirect()->route('Admin::permissions.index');
    }

    public function destroy($id)
    {
        $permission = Permission::destroy($id);
        return back();
    }
}
