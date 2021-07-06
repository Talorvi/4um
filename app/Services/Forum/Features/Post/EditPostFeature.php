<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Post\Jobs\EditPostJob;
use App\Domains\Post\Jobs\GetPostJob;
use App\Domains\Post\Requests\EditPost;
use App\Events\ThreadUpdated;
use App\Services\Forum\Operations\EditPostOperation;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditPostFeature extends Feature
{
    public function handle(EditPost $request)
    {
        $result = $this->run(EditPostOperation::class, [
            'request' => $request
        ]);

        if ($result) {
            $thread = $this->run(GetPostJob::class, [
                'post_id' => $request->input('post_id')
            ])->thread;
            event(new ThreadUpdated($thread));

            return $this->run(new RespondWithJsonJob([
                'success' => 'Post edited successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Post could not be edited properly. Check post ID.'
        ]));
    }
}
