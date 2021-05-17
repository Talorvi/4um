<?php

namespace App\Services\Forum\Features;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\DeleteThreadJob;
use App\Domains\Thread\Requests\DeleteThread;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeleteThreadFeature extends Feature
{
    public function handle(DeleteThread $request)
    {
        $result = $this->run(DeleteThreadJob::class, [
            'thread_id' => $request->input('thread_id')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Thread deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'thread_id' => 'Thread could not be deleted properly. Check thread ID.'
        ]));
    }
}
