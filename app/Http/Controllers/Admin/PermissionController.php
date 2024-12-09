<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class PermissionController extends BaseController
{
    public function addUserWithRole(Request $request)
    {
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role-user');
        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'user_role' => 'required',
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'password' => 'sometimes',
                ]);
                if ($validator->fails()) {
                    return $this->responseJson(false, 400, $validator->errors()->first());
                }
                DB::beginTransaction();

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                if (isset($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->save();

                $user_role = $request->user_role;

                $user->roles()->attach($user_role);

                if (isset($user) && !empty($user)) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'User Role Assign has been successfully', route('admin.list.user.role'));
                }
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN') ?? $e->getMessage(), '');
            }
        }
        return view('admin.pages.permission.add');
    }

    public function editUserWithRole(Request $request, $user_id)
    {
        $id = Crypt::decrypt($user_id);
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role-user');
        $id = Crypt::decrypt($user_id);
        if ($request->isMethod('post')) {
            try {
                $validator = Validator::make($request->all(), [
                    'user_role' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'sometimes',
                ]);
                if ($validator->fails()) {
                    return $this->responseJson(false, 400, $validator->errors()->first());
                }
                DB::beginTransaction();
                $user = User::where('id', $id)->first();
                $user->name = $request->name;
                $user->email = $request->email;
                if (isset($request->password)) {
                    $user->password = Hash::make($request->password);
                }
                $user->save();

                $user_role = $request->user_role;
                $user->roles()->detach();
                $user->roles()->attach($user_role);
                if (isset($user) && !empty($user)) {
                    DB::commit();
                    return $this->responseJson(true, 200, 'User Role Assign has been successfully', route('admin.list.user.role'));
                }
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN') ?? $e->getMessage(), '');
            }
        }
        $user = User::find($id);
        return view('admin.pages.permission.edit', compact('user'));
    }

    public function listUserWithRole()
    {
        Session::put('page', 'role-permission');
        Session::put('activeRoute', 'route-role-user');

        return view('admin.pages.permission.list');
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
                $userDetails = User::find($request->id);
                if (!$userDetails) {
                    return $this->responseJson(false, 200, 'User not found!', route('admin.list.user.role'));
                }
                $userDetails->delete();
                if (isset($userDetails) && !empty($userDetails)) {
                    DB::commit();
                    return $this->responseJson(true, 200, "Deleted Successfully", route('admin.list.user.role'));
                }
                return $this->responseJson(false, 200, "Deleted Failed", route('admin.list.user.role'));
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, (onProduction()) ? config('message.MSG_ERROR_TRY_AGAIN') : $e->getMessage(), '');
            }
        }

    }
}
