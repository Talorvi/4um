<?php

namespace App\Services\Forum\Features\Thread;

use App\Domains\Thread\Requests\AddThread;
use App\Domains\Thread\Jobs\AddThreadJob;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddThreadFeature extends Feature
{
    public function handle(AddThread $request)
    {
        $thread = $this->run(AddThreadJob::class, [
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'tags' => $request->input('tags'),
            'user' => $request->user()
        ]);

        return $this->run(new RespondWithJsonJob($thread));
    }
}
