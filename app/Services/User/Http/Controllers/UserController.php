<?php

namespace App\Services\User\Http\Controllers;

use App\Services\User\Features\GetUserFeature;
use App\Services\User\Features\GetUsersFeature;
use App\Services\User\Features\EditAvatarFeature;
use App\Services\User\Features\EditUserFeature;
use Lucid\Units\Controller;

class UserController extends Controller
{
    public function getUser()
    {
        return $this->serve(GetUserFeature::class);
    }

    public function getUsers()
    {
        return $this->serve(GetUsersFeature::class);
    }

    public function editUser()
    {
        return $this->serve(EditUserFeature::class);
    }

    public function editAvatar()
    {
        return $this->serve(EditAvatarFeature::class);
    }
}
