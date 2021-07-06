<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Post\Jobs\DeletePostJob;
use App\Domains\Post\Jobs\GetPostJob;
use App\Domains\Post\Requests\DeletePost;
use App\Events\ThreadUpdated;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeletePostFeature extends Feature
{
    public function handle(DeletePost $request)
    {
        $thread = $this->run(GetPostJob::class, [
            'post_id' => $request->input('post_id')
        ])->thread;

        $result = $this->run(DeletePostJob::class, [
            'post_id' => $request->input('post_id')
        ]);

        if ($result) {
            event(new ThreadUpdated($thread));

            return $this->run(new RespondWithJsonJob([
                'success' => 'Post deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Post could not be deleted properly. Check post ID.'
        ]));
    }
}
