<?php

namespace App\Services\Forum\database\seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $user = Role::create(['name' => 'user']);

        $addThread = Permission::create(['name' => 'add thread']);
        $editThread = Permission::create(['name' => 'edit thread']);
        $deleteThread = Permission::create(['name' => 'delete thread']);

        $addPost = Permission::create(['name' => 'add post']);
        $editPost = Permission::create(['name' => 'edit post']);
        $deletePost = Permission::create(['name' => 'delete post']);

        $addReply = Permission::create(['name' => 'add reply']);
        $editReply = Permission::create(['name' => 'edit reply']);
        $deleteReply = Permission::create(['name' => 'delete reply']);

        $acceptPosts = Permission::create(['name' => 'accept posts']);
        $denyPosts = Permission::create(['name' => 'deny posts']);

        /**
         * user
         */
        $user->givePermissionTo($addThread);
        $user->givePermissionTo($editThread);
        $user->givePermissionTo($deleteThread);

        $user->givePermissionTo($addPost);
        $user->givePermissionTo($editPost);
        $user->givePermissionTo($deletePost);

        $user->givePermissionTo($addReply);
        $user->givePermissionTo($editReply);
        $user->givePermissionTo($deleteReply);

        /**
         * moderator
         */
        $moderator->givePermissionTo($acceptPosts);
        $moderator->givePermissionTo($denyPosts);

        $moderator->givePermissionTo($addThread);
        $moderator->givePermissionTo($editThread);
        $moderator->givePermissionTo($deleteThread);

        $moderator->givePermissionTo($addPost);
        $moderator->givePermissionTo($editPost);
        $moderator->givePermissionTo($deletePost);

        $moderator->givePermissionTo($addReply);
        $moderator->givePermissionTo($editReply);
        $moderator->givePermissionTo($deleteReply);

        /**
         * admin
         */
        $admin->givePermissionTo($acceptPosts);
        $admin->givePermissionTo($denyPosts);

        $admin->givePermissionTo($acceptPosts);
        $admin->givePermissionTo($denyPosts);

        $admin->givePermissionTo($addThread);
        $admin->givePermissionTo($editThread);
        $admin->givePermissionTo($deleteThread);

        $admin->givePermissionTo($addPost);
        $admin->givePermissionTo($editPost);
        $admin->givePermissionTo($deletePost);

        $admin->givePermissionTo($addReply);
        $admin->givePermissionTo($editReply);
        $admin->givePermissionTo($deleteReply);
    }
}
