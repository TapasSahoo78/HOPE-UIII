<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Role as SELF_MODEL;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\Role;
use Exception;

class RoleController extends BaseController
{

    public function index()
    {
        // Set session variables
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role');

        return view('admin.pages.role.list');
    }

    public function addRole(Request $request)
    {
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role');
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,name',
                'permissions' => 'required|array',
            ]);
            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $role = new SELF_MODEL();
                $role->name = $request->role_name;
                $role->slug = Str::slug($request->role_name);
                $role->save();
                $data = [];
                foreach ($request->permissions as $key => $value) {
                    $data[] = ['role_id' => $role->id, 'permission_id' => $value];
                }

                DB::table('roles_permissions')->insert($data);

                if (isset($role) && !empty($role)) {
                    DB::commit();
                    return $this->responseJson(true, 200, config('message.MSG_RECORD_INSERT_SUCCESS'), route('admin.role.list'));
                }
                return $this->responseJson(false, 200, config('message.MSG_RECORD_INSERT_FAILED'), route('admin.role.list'));
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN') ?? $e->getMessage(), '');
            }
        }
        $permissions = Permission::get()->groupBy('group_name');
        return view('admin.pages.role.add', compact('permissions'));
    }

    public function editRole(Request $request, $role_id)
    {
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role');
        $id = Crypt::decrypt($role_id);
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'permissions' => 'required|array',
            ]);
            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $updateRole = SELF_MODEL::find($id);
                $updateRole->name = $request->role_name;
                $updateRole->slug = Str::slug($request->role_name);
                $updateRole->save();

                DB::table('roles_permissions')->where('role_id', $updateRole->id)->delete();
                $data = [];
                foreach ($request->permissions as $key => $value) {
                    $data[] = ['role_id' => $updateRole->id, 'permission_id' => $value];
                }

                DB::table('roles_permissions')->insert($data);

                if (isset($updateRole) && !empty($updateRole)) {
                    DB::commit();
                    return $this->responseJson(true, 200, config('message.MSG_RECORD_UPDATE_SUCCESS'), route('admin.role.list'));
                }
                return $this->responseJson(false, 200, config('message.MSG_RECORD_UPDATE_FAILED'), '');
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN') ?? $e->getMessage(), '');
            }
        }
        $data = SELF_MODEL::with('permissions')->find($id);

        $permissions = Permission::get()->groupBy('group_name');
        return view('admin.pages.role.edit', compact('data', 'permissions'));
    }

    public function destroy(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'id' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->responseJson(false, 400, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $roleDetails = Role::find($request->id);
                if (!$roleDetails) {
                    return $this->responseJson(false, 200, 'Role not found!', route('admin.role.list'));
                }
                DB::table('roles_permissions')->where('role_id', $request->id)->delete();
                $roleDetails->delete();
                if (isset($roleDetails) && !empty($roleDetails)) {
                    DB::commit();
                    return $this->responseJson(true, 200, "Deleted Successfully", route('admin.role.list'));
                }
                return $this->responseJson(false, 200, "Deleted Failed", route('admin.role.list'));
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN') ?? $e->getMessage(), '');
            }
        }

    }
}
