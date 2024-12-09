<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $permissions = [
            ['name' => 'View', 'slug' => 'user_mgmt_view', 'group_name' => 'User Management'],
            ['name' => 'Add', 'slug' => 'user_mgmt_add', 'group_name' => 'User Management'],
            ['name' => 'Edit', 'slug' => 'user_mgmt_edit', 'group_name' => 'User Management'],
            ['name' => 'Delete', 'slug' => 'user_mgmt_delete', 'group_name' => 'User Management'],
            ['name' => 'Change Status', 'slug' => 'user_mgmt_canChangeStatus', 'group_name' => 'User Management'],
            ['name' => 'Can Make Verify', 'slug' => 'user_mgmt_canMakeVerify', 'group_name' => 'User Management'],

            ['name' => 'View', 'slug' => 'inquiry_mgmt_view', 'group_name' => 'Inquiry Management'],
            ['name' => 'Add', 'slug' => 'inquiry_mgmt_add', 'group_name' => 'Inquiry Management'],
            ['name' => 'Edit', 'slug' => 'inquiry_mgmt_edit', 'group_name' => 'Inquiry Management'],
            ['name' => 'Delete', 'slug' => 'inquiry_mgmt_delete', 'group_name' => 'Inquiry Management'],

            ['name' => 'View', 'slug' => 'cms_mgmt_view', 'group_name' => 'Cms Management'],
            ['name' => 'Add', 'slug' => 'cms_mgmt_add', 'group_name' => 'Cms Management'],
            ['name' => 'Edit', 'slug' => 'cms_mgmt_edit', 'group_name' => 'Cms Management'],
            ['name' => 'Delete', 'slug' => 'cms_mgmt_delete', 'group_name' => 'Cms Management'],

            ['name' => 'View', 'slug' => 'notification_mgmt_view', 'group_name' => 'Notification Management'],
            ['name' => 'Add', 'slug' => 'notification_mgmt_add', 'group_name' => 'Notification Management'],
            ['name' => 'Edit', 'slug' => 'notification_mgmt_edit', 'group_name' => 'Notification Management'],
            ['name' => 'Delete', 'slug' => 'notification_mgmt_delete', 'group_name' => 'Notification Management'],
        ];

        // Insert the roles into the roles table
        foreach ($permissions as $permissionData) {
            Permission::create($permissionData);
        }
    }

}
