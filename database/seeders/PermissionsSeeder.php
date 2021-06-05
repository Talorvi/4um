<?php

namespace Database\Seeders;

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
        $editOwnThread = Permission::create(['name' => 'edit own thread']);
        $editThread = Permission::create(['name' => 'edit thread']);
        $deleteThread = Permission::create(['name' => 'delete thread']);
        $deleteOwnThread = Permission::create(['name' => 'delete own thread']);

        $addPost = Permission::create(['name' => 'add post']);
        $editOwnPost = Permission::create(['name' => 'edit own post']);
        $editPost = Permission::create(['name' => 'edit post']);
        $deletePost = Permission::create(['name' => 'delete post']);
        $deleteOwnPost = Permission::create(['name' => 'delete own post']);

        $addReply = Permission::create(['name' => 'add comment']);
        $editOwnReply = Permission::create(['name' => 'edit own comment']);
        $editReply = Permission::create(['name' => 'edit comment']);
        $deleteReply = Permission::create(['name' => 'delete comment']);
        $deleteOwnReply = Permission::create(['name' => 'delete own comment']);

        $acceptPosts = Permission::create(['name' => 'accept posts']);
        $denyPosts = Permission::create(['name' => 'deny posts']);

        /**
         * user
         */
        $user->givePermissionTo($addThread);
        $user->givePermissionTo($editOwnThread);
        $user->givePermissionTo($deleteOwnThread);

        $user->givePermissionTo($addPost);
        $user->givePermissionTo($editOwnPost);
        $user->givePermissionTo($deleteOwnPost);

        $user->givePermissionTo($addReply);
        $user->givePermissionTo($editOwnReply);
        $user->givePermissionTo($deleteOwnReply);

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
