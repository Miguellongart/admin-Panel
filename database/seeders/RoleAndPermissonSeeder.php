<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::updateOrCreate(["name" => "SuperAdmin"],['description' => 'Super Administrador']);
        $admin = Role::updateOrCreate(["name" => "admin"],['description' => 'Administrador']);
        /*home*/
        Permission::updateOrCreate(['name' => 'admin.home'],
        ['description' => 'Ver Home'])->syncRoles([$superAdmin, $admin]);

        /*Asginar*/
        Permission::updateOrCreate(['name' => 'admin.assign.roles'],
            ['description' => 'Asignar/Retirar roles al usuario'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(['name' => 'admin.assign.permissions'],
            ['description' => 'Asignar/Retirar permisos al usuario'])->syncRoles([$superAdmin]);

        /*usuarios*/
        Permission::updateOrCreate(
            ['name' => 'user.index'], 
            ['description' => 'Listado Usuarios'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'user.create'], 
            ['description' => 'Crear usuario'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'user.edit'], 
            ['description' => 'Editar usuario'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'user.delete'], 
            ['description' => 'Eliminar usuario'])->syncRoles([$superAdmin]);

        /*roles*/
        Permission::updateOrCreate(
            ['name' => 'admin.rol.index'], 
            ['description' => 'Listado roles'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'admin.rol.create'], 
            ['description' => 'Crear rol'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'admin.rol.edit'], 
            ['description' => 'Editar rol'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'admin.rol.delete'], 
            ['description' => 'Eliminar rol'])->syncRoles([$superAdmin]);
            
        /*permisos*/
        Permission::updateOrCreate(
            ['name' => 'admin.permissions.index'], 
            ['description' => 'Listado permisos'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'admin.permissions.create'], 
            ['description' => 'Crear permiso'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'admin.permissions.edit'], 
            ['description' => 'Editar permiso'])->syncRoles([$superAdmin]);
        Permission::updateOrCreate(
            ['name' => 'admin.permissions.delete'], 
            ['description' => 'Eliminar permiso'])->syncRoles([$superAdmin]);

        /*roles*/
        Permission::updateOrCreate(
            ['name' => 'admin.util.index'], 
            ['description' => 'Listar'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'admin.util.create'], 
            ['description' => 'Crear'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'admin.util.edit'], 
            ['description' => 'Editar'])->syncRoles([$superAdmin, $admin]);
        Permission::updateOrCreate(
            ['name' => 'admin.util.delete'], 
            ['description' => 'Eliminar'])->syncRoles([$superAdmin, $admin]);
    }
}
