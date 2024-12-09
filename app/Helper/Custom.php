<?php

use App\Models\Role;

if (!function_exists('getRolesList')) {
    function getRolesList($role_id = null)
    {
        $roles = Role::whereNotIn('slug', ['user', 'admin'])
            ->select('id', 'name')
            ->get();

        $options = ["<option value='' selected>Select Role</option>"];

        foreach ($roles as $role) {
            $selected = ($role_id == $role->id) ? "selected" : "";
            echo "<option value='{$role->id}' {$selected}>{$role->name}</option>";
        }
    }
}
