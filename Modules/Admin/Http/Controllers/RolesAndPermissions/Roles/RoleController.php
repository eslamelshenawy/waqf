<?php

namespace Modules\Admin\Http\Controllers\RolesAndPermissions\Roles;

use Modules\Admin\Http\Requests\StoreRole;
use \Spatie\Permission\Models\Permission;
use \Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Administrator;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\AdminLogin;


class RoleController extends Controller
{

    public function index()
    {
        bread_crumb('Permissions and Roles | Roles');
        $roles = Role::where('name', '!=', 'super-admin')->get();
        return view('admin::roles_and_permissions.roles.index', compact('roles'));
    }

    public function show()
    {

    }

    public function create()
    {
        bread_crumb('Permissions and Roles | Roles | New');
        $permissions = Permission::all();
        return view('admin::roles_and_permissions.roles.create', compact('permissions'));
    }

    public function store(StoreRole $request)
    {

        $validated = $request->validated();

        $models = str_replace('.php', '', getModels());

        $permissions = collect();

        $role = Role::create(['guard_name' => 'admin', 'name' => $request->post('name')]);

        if($request->has('create')){
            $createList = $request->post('create');
            foreach($createList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("create " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('read')){
            $readList = $request->post('read');
            foreach($readList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("read " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('update')){
            $updateList = $request->post('update');
            foreach($updateList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("update " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('delete')){
            $deleteList = $request->post('delete');
            foreach($deleteList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("delete " . plural(strtolower($model)));
                }
            }
        }

        if($permissions->count()){
            $permissions->each(function ($permission) use (&$role){
                $role->givePermissionTo($permission);
            });
        }

//        $validated = $request->validated();

//




//        if($permissions && count($permissions) > 0){
//
//
//            $role->syncPermissions($createdPermissions);
//        }

        session()->flash('success');

        return redirect()->route('Admin::roles.index');
    }

    public function edit($id)
    {
        bread_crumb('Permissions and Roles | Roles | Edit');
        $roles = Role::with('permissions')->find($id);
        $permissions = Permission::all();
        return view('admin::roles_and_permissions.roles.edit', compact('permissions','roles'));
    }

    public function update(Request $request, $id)
    {

        $models = str_replace('.php', '', getModels());

        $role = Role::with('permissions')->find($id);
        $permissions = collect();

        $role->update(['guard_name' => 'admin', 'name' => $request->post('name')]);

        if($request->has('create')){
            $createList = $request->post('create');
            foreach($createList as $index => $model){
                // dd(plural(strtolower($model)), $request->all(),$models);
                if(in_array($model, $models)){
                    $permissions->push("create " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('read')){
            $readList = $request->post('read');
            foreach($readList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("read " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('update')){
            $updateList = $request->post('update');
            foreach($updateList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("update " . plural(strtolower($model)));
                }
            }
        }

        if($request->has('delete')){
            $deleteList = $request->post('delete');
            foreach($deleteList as $index => $model){
                if(in_array($model, $models)){
                    $permissions->push("delete " . plural(strtolower($model)));
                }
            }
        }
            
            // dd($role);
        if($permissions->count()){
            foreach($role->permissions as $rP){
                // dd($rP->pivot->delete());
                $rP->pivot->delete();
            }
            $permissions->each(function ($permission) use (&$role){
                $role->givePermissionTo($permission);
            });
        }
// dd($request->all(),$request->has('delete'),$permissions->count(),$permissions,$role);
        session()->flash('success');

        return redirect()->route('Admin::roles.index');

    }

    public function destroy($id)
    {
        $permission = Role::destroy($id);
        return back();

    }
}
