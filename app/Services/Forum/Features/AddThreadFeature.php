<?php

namespace App\Services\Forum\Features;

use App\Domains\Post\Jobs\AddThreadJob;
use App\Domains\Post\Requests\AddThread;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddThreadFeature extends Feature
{
    public function handle(AddThread $request)
    {
        $thread = $this->run(AddThreadJob::class, [
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'user' => $request->user()
        ]);

        return $this->run(new RespondWithJsonJob($thread));
    }
}
