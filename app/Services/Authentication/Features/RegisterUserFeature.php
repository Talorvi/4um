<?php

namespace App\Services\Authentication\Features;

use App\Domains\Authentication\Jobs\RegisterJob;
use App\Domains\Authentication\Requests\Register;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class RegisterUserFeature extends Feature
{
    public function handle(Register $request)
    {
        $user = $this->run(RegisterJob::class, [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return $this->run(new RespondWithJsonJob($user));
    }
}
