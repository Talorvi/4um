<?php

namespace App\Services\Authentication\Http\Controllers;

use App\Services\Authentication\Features\LoginUserFeature;
use App\Services\Authentication\Features\RegisterUserFeature;
use Lucid\Units\Controller;

class AuthenticationController extends Controller
{
    public function registerUser() {
        return $this->serve(RegisterUserFeature::class);
    }

    public function loginUser() {
        return $this->serve(LoginUserFeature::class);
    }
}
