<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\VoteForThreadJob;
use App\Domains\Thread\Requests\VoteForThread;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class VoteForThreadFeature extends Feature
{
    public function handle(VoteForThread $request)
    {
        $result = $this->run(VoteForThreadJob::class, [
            'thread_id' => $request->input('thread_id'),
            'score'     => $request->input('score')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Voted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'thread_id' => 'Couldn\'t vote. Check thread ID.'
        ]));
    }
}
