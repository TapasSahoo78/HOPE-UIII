<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AjaxController extends Controller
{
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            // Fetch data from the Role model
            $data = Role::
                // where('is_admin', 1)
                // ->where('slug', '!=', 'admin')
                select('id', 'name');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-warning btn-sm edit" data-id="' . $row->id . '">Edit</button>
                            <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
