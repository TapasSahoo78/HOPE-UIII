<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Repositories\AdminAuthRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    protected $authService;
    protected $loginRules = [
        'email' => 'required|email',
        'password' => 'required|string|min:6',
    ];
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(AdminAuthRepository $authService)
    {
        $this->authService = $authService;
    }
    public function adminLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), $this->loginRules);

            if ($validator->fails()) {
                return $this->responseJson(false, 200, $validator->errors()->first());
            }
            DB::beginTransaction();
            try {
                $insert_arry = request()->except(['_token', '_method', 'id']);
                $adminLogin = $this->authService->checkAdminCredential($insert_arry);
                if (isset($adminLogin) && !empty($adminLogin)) {
                    DB::commit();
                    return $this->responseJson(true, 200, config('message.MSG_RECORD_LOGIN_SUCCESS'), route('admin.dashboard'));
                }
                return $this->responseJson(false, 200, config('message.MSG_RECORD_LOGIN_FAILED'), route('admin.login'));
            } catch (Exception $e) {
                DB::rollback();
                logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
                return $this->responseJson(false, 500, config('message.MSG_ERROR_TRY_AGAIN'), route('admin.login'));
            }
        }
        return view('auth.signin');
    }
}
