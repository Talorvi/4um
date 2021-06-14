<?php

namespace App\Services\User\Features;

use App\Domains\User\Jobs\GetUsersJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetUsersFeature extends Feature
{
    public function handle(Request $request)
    {
        $users = $this->run(GetUsersJob::class);

        return $this->run(new RespondWithJsonJob($users));
    }
}
