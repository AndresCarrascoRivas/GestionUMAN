<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $tecnicoRole = Role::firstOrCreate(['name' => 'tecnico']);
        $supervisorRole = Role::firstOrCreate(['name' => 'supervisor']);

        // Crear permisos
        $crearOrden = Permission::firstOrCreate(['name' => 'crear orden']);
        $editarOrden = Permission::firstOrCreate(['name' => 'editar orden']);
        $eliminarOrden = Permission::firstOrCreate(['name' => 'eliminar orden']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([$crearOrden, $editarOrden, $eliminarOrden]);
        $tecnicoRole->givePermissionTo([$crearOrden]);
        $supervisorRole->givePermissionTo([$editarOrden]);

        // Crear usuarios de prueba
        $admin = User::firstOrCreate(
            ['email' => 'admin@uman.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('admin123'),
                'telefono' => '999999999',
                'cargo' => 'Administrador General',
            ]
        );
        $admin->assignRole('admin');

        $tecnico = User::firstOrCreate(
            ['email' => 'tecnico@uman.com'],
            [
                'name' => 'Técnico UMAN',
                'password' => bcrypt('tecnico123'),
                'telefono' => '888888888',
                'cargo' => 'Técnico',
            ]
        );
        $tecnico->assignRole('tecnico');

        $supervisor = User::firstOrCreate(
            ['email' => 'supervisor@uman.com'],
            [
                'name' => 'Supervisor UMAN',
                'password' => bcrypt('supervisor123'),
                'telefono' => '777777777',
                'cargo' => 'Supervisor',
            ]
        );
        $supervisor->assignRole('supervisor');
    }
}
