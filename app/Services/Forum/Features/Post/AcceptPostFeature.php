<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Post\Jobs\AcceptPostJob;
use App\Domains\Post\Requests\AcceptPost;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AcceptPostFeature extends Feature
{
    public function handle(AcceptPost $request)
    {
        $result = $this->run(AcceptPostJob::class, [
            'post_id'  => $request->input('post_id'),
            'accepted' => $request->input('accepted'),
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Post has been processed.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Post could not be accepted properly. Check post ID.'
        ]));
    }
}
