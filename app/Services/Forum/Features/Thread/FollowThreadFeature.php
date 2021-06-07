<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\FollowThreadJob;
use App\Domains\Thread\Requests\FollowThread;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class FollowThreadFeature extends Feature
{
    public function handle(FollowThread $request)
    {
        $result = $this->run(FollowThreadJob::class, [
            'thread_id' => $request->input('thread_id'),
            'follow'    => $request->input('follow')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Thread (un)followed successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'thread_id' => 'Thread could not be (un)followed properly. Check thread ID.'
        ]));
    }
}
