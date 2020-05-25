<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'veiculo-list',
            'veiculo-create',
            'veiculo-edit',
            'veiculo-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
         ];
    
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
