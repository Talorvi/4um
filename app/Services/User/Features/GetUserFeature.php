<?php

namespace App\Services\User\Features;

use App\Domains\User\Jobs\GetUserJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetUserFeature extends Feature
{
    public function handle(Request $request)
    {
        $user = $this->run(GetUserJob::class, [
            'user_id' => $request->input('user_id')
        ]);

        return $this->run(new RespondWithJsonJob($user));
    }
}
