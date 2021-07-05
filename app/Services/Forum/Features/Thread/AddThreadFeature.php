<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Thread\Requests\AddThread;
use App\Domains\Thread\Jobs\AddThreadJob;
use App\Services\Forum\Operations\AddThreadOperation;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddThreadFeature extends Feature
{
    public function handle(AddThread $request)
    {
        $thread = $this->run(AddThreadOperation::class, [
            'request' => $request
        ]);

        return $this->run(new RespondWithJsonJob($thread));
    }
}
