<?php

namespace App\Http\Middleware;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;
use Lucid\Bus\UnitDispatcher;

class Authenticate extends Middleware
{
    use UnitDispatcher;
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
    {
        throw new HttpResponseException(
            $this->run(RespondWithJsonResponseErrorJob::class, [
                'errors' => [
                    'token' => 'Invalid token. Could not authenticate.'
                ]
            ])
        );
    }
}
