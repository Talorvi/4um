<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Thread\Jobs\GetThreadsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetThreadsFeature extends Feature
{
    public function handle(Request $request)
    {
        $threads = $this->run(GetThreadsJob::class);

        return $this->run(new RespondWithJsonJob($threads));
    }
}
