<?php

namespace App\Repositories;

use App\Interfaces\RoleInterface;
use App\Models\Role as SELF_MODEL;
use Illuminate\Support\Facades\Auth;

class RoleRepository implements RoleInterface
{
    public function roleList($data = null)
    {
        $roles = SELF_MODEL::whereNotIn('slug', ['admin', 'user'])->paginate();
        return $roles;
    }
}
