<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        // Ver menu de administrador
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);

        // USERS
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        // 
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        // 
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        //* CATEGORIES * */
        // ver listado de categorias
        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$role1]);
        // crear cateogria
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$role1]);
        // editar categoria
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$role1]);
        // eliminar categoria
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$role1]);

        //* TAGS * */
        // ver listado de tags
        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$role1]);
        // crear tags
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$role1]);
        // editar tags
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$role1]);
        // eliminar tags
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$role1]);

        //* POSTS * */
        // ver listado de posts
        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$role1, $role2]);
        // crear posts
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$role1, $role2]);
        // editar posts
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$role1, $role2]);
        // eliminar posts
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$role1, $role2]);
    }
}
