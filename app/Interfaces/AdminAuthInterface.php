<?php

namespace App\Interfaces;

interface AdminAuthInterface
{
    public function checkAdminCredential($data);
    public function logout();
}
