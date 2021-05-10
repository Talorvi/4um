<?php

namespace App\Services\Authentication\Http\Controllers;

use App\Services\Authentication\Features\RegisterUserFeature;
use Exception;
use Lucid\Units\Controller;

class AuthenticationController extends Controller
{
    public function registerUser() {
        return $this->serve(RegisterUserFeature::class);
    }
}
