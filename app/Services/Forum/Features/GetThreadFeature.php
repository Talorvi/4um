<?php

namespace App\Services\Forum\Features;

use App\Domains\Thread\Jobs\GetThreadJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetThreadFeature extends Feature
{
    public function handle(Request $request)
    {
        $thread = $this->run(GetThreadJob::class, [
            'thread_id' => $request->input('thread_id')
        ]);

        return $this->run(new RespondWithJsonJob($thread));
    }
}
