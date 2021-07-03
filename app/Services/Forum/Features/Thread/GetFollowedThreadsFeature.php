<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Thread\Jobs\GetFollowedThreadsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetFollowedThreadsFeature extends Feature
{
    public function handle(Request $request)
    {
        $threads = $this->run(GetFollowedThreadsJob::class);

        return $this->run(new RespondWithJsonJob($threads));
    }
}
