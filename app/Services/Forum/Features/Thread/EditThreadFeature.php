<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\EditThreadJob;
use App\Domains\Thread\Requests\EditThread;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditThreadFeature extends Feature
{
    public function handle(EditThread $request)
    {
        $result = $this->run(EditThreadJob::class, [
            'thread_id' => $request->input('thread_id'),
            'title'     => $request->input('title'),
            'text'      => $request->input('text'),
            'tags'      => $request->input('tags')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Thread edited successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'thread_id' => 'Thread could not be edited properly. Check thread ID.'
        ]));
    }
}
