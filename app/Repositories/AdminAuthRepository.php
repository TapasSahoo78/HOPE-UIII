<?php

namespace App\Repositories;

use App\Interfaces\AdminAuthInterface;
use App\Models\User as SELF_MODEL;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthInterface
{
    /**
     * login validation
     */
    public function checkAdminCredential($data)
    {
        $userCredentials = array(
            'email' => $data['email'],
            'password' => $data['password'],
        );
        $user = SELF_MODEL::where('email', $data['email'])->first();

        $remember = isset($data['remember_me']) ? true : false;
        $login = Auth::attempt($userCredentials, $remember);
        if ($login) {
            return $login;
        }
    }

    public function logout()
    {
        $logout = Auth::logout();
        return $logout;
    }
}
