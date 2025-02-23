<?php

namespace Database\Seeders;

use App\Enum\PermissionsEnum;
use App\Enum\RolesEnum;
use App\Models\Feature;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => RolesEnum::Admin->value]);
        $directorRole = Role::create(['name' => RolesEnum::Director->value]);
        $profRole = Role::create(['name' => RolesEnum::Prof->value]);
        $secretaryRole = Role::create(['name' => RolesEnum::Secretary->value]);

        // Create permissions for Admin, Director, Prof and Secretary
        $approvePlanPermission = Permission::create([
            'name' => PermissionsEnum::ApprovePlans->value,
        ]);
        $commentPlanPermission = Permission::create([
            'name' => PermissionsEnum::CommentReason->value,
        ]);
        $generateTemplatePermission = Permission::create([
            'name' => PermissionsEnum::GenerateTemplate->value,
        ]);
        $manageUsersPermission = Permission::create([
            'name' => PermissionsEnum::ManageUsers->value,
        ]);
        $rejectPlanPermission = Permission::create([
            'name' => PermissionsEnum::RejectPlans->value,
        ]);
        $submitPlanPermission = Permission::create([
            'name' => PermissionsEnum::SubmitPlan->value,
        ]);

        // Sync permissions for Admin, Director, Prof and Secretary
        $adminRole->syncPermissions([$approvePlanPermission, $commentPlanPermission, $generateTemplatePermission, $manageUsersPermission, $rejectPlanPermission, $submitPlanPermission]);
        $directorRole->syncPermissions([$approvePlanPermission, $commentPlanPermission, $rejectPlanPermission]);
        $profRole->syncPermissions([$generateTemplatePermission, $submitPlanPermission]);
        $secretaryRole->syncPermissions([$approvePlanPermission, $commentPlanPermission, $rejectPlanPermission]);

        // Create users and assign roles to them
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ])->assignRole(RolesEnum::Admin);
        User::factory()->create([
            'name' => 'Director',
            'email' => 'director@example.com',
        ])->assignRole(RolesEnum::Director);
        User::factory()->create([
            'name' => 'Prof',
            'email' => 'prof@example.com',
        ])->assignRole(RolesEnum::Prof);
        User::factory()->create([
            'name' => 'Secretary',
            'email' => 'secretary@example.com',
        ])->assignRole(RolesEnum::Secretary);
    }
}
