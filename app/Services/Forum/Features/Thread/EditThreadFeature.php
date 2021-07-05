<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Thread\Jobs\EditThreadJob;
use App\Domains\Thread\Requests\EditThread;
use App\Services\Forum\Operations\EditThreadOperation;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditThreadFeature extends Feature
{
    public function handle(EditThread $request)
    {
        $result = $this->run(EditThreadOperation::class, [
            'request' => $request
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
