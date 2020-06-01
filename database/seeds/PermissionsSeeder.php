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
            'role-destroy',
            'veiculo-list',
            'veiculo-create',
            'veiculo-edit',
            'veiculo-destroy',
            'user-list',
            'user-create',
            'user-edit',
            'user-destroy',
            'mecanico-list',
            'mecanico-create',
            'mecanico-edit',
            'mecanico-destroy',
            'manutencao-list',
            'manutencao-create',
            'manutencao-edit',
            'manutencao-destroy',
            'ver-estatisticas'
         ];
    
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
