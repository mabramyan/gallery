<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use App\Models\Settings;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'Administer roles & permissions']);
       
        Permission::create(['name' => 'Can add post']);
        Permission::create(['name' => 'Can edit post']);
        Permission::create(['name' => 'Can delete post']);
        Permission::create(['name' => 'Can comment']);
        Permission::create(['name' => 'Can vote']);


        // create roles and assign created permissions


        // or may be done by chaining


        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::findOrFail(1);

        $user->assignRole($role);

        $role1 = Role::create(['name' => 'Moderator']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');
        $role1->givePermissionTo('publish articles');
        $role1->givePermissionTo('unpublish articles');

        $role2 = Role::create(['name' => 'User']);
        $role2->givePermissionTo('Can add post');
        $role2->givePermissionTo('Can edit post');
        $role2->givePermissionTo('Can delete post');
        $role2->givePermissionTo('Can comment');
        $role2->givePermissionTo('Can vote');

        Settings::create(['key'=>'default_user_role','value'=>$role2->id]);
    }
}
