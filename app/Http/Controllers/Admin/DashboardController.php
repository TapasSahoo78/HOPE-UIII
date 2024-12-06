<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminAuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class DashboardController extends Controller
{
    protected $authService;
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminAuthRepository $authService)
    {
        $this->authService = $authService;
    }
    public function adminDashboard(Request $request)
    {
        return view('admin.pages.dashboard');
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $this->authService->logout();
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.login');
        }
    }

    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'keyId' => 'required',
            'status' => 'required',
            'table' => 'required',
            'field' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => FALSE,
                    'message' => $validator->errors()->first(),
                    'redirect' => ''
                ],
                200
            );
        }
        try {

            $updateData = [$request->field => $request->field == 'deleted_at' ? Carbon::now() : $request->status];

            DB::table($request->table)->where($request->keyId, $request->id)->update($updateData);

            return response()->json(
                [
                    'status' => TRUE,
                    'message' => $request->field == 'deleted_at' ? 'Deleted successfully' : 'Status updated successfully',
                    'redirect' => "",
                    'postStatus' => $request->status
                ],
                200
            );
        } catch (\Exception $e) {
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return response()->json([
                'status' => FALSE,
                'message' => 'Something Went Terribly Wrong.',
                'redirect' => ''
            ], 500);
        }
    }
}
