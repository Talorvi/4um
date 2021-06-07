<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Post\Jobs\AcceptPostJob;
use App\Domains\Post\Requests\AcceptPost;
use Lucid\Units\Feature;

class AcceptPostFeature extends Feature
{
    public function handle(AcceptPost $request)
    {
        return $this->run(AcceptPostJob::class, [
            'post_id'  => $request->input('post_id'),
            'accepted' => $request->input('accepted'),
        ]);
    }
}
