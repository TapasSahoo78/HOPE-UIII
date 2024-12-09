<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            // Fetch data from the Role model
            $data = Role::
                where('is_admin', 0)
                ->where('slug', '!=', 'admin')
                ->select('id', 'name');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-primary btn-sm edit" data-id="' . $row->id . '">Edit</button>
                            <button class="btn btn-primary btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function assignUserData()
    {
        $data = User::with('roles')->whereHas('roles', function ($q) {
            $q->where('slug', '!=', 'user');
            $q->where('slug', '!=', 'admin');
        })->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('DT_RowIndex', function ($user) {
                return ''; // You can return the index here if needed
            })
            ->addColumn('role', function ($user) {
                return $user->roles->pluck('name')->implode(', '); // Assuming roles is a collection
            })
            ->addColumn('action', function ($user) {
                return '<button class="btn btn-primary" onclick="window.location.href=\'' . route('admin.edit.user.role', Crypt::encrypt($user->id)) . '\'">Edit</button>';
            })
            ->make(true);
    }
}
