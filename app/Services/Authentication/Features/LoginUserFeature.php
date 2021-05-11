<?php

namespace App\Services\Authentication\Features;

use App\Domains\Authentication\Jobs\GenerateTokenJob;
use App\Domains\Authentication\Jobs\LoginJob;
use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Authentication\Requests\Login;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class LoginUserFeature extends Feature
{
    public function handle(Login $request)
    {
        $user = $this->run(LoginJob::class, [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if (!$user) {
            return $this->run(new RespondWithJsonResponseErrorJob([
                'login' => 'Wrong credentials'
            ]));
        }

        $token = $this->run(GenerateTokenJob::class, [
            'user' => $user
        ]);

        return $this->run(new RespondWithJsonJob($token));
    }
}
