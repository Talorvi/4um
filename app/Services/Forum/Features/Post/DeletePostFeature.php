<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Post\Jobs\DeletePostJob;
use App\Domains\Post\Requests\DeletePost;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeletePostFeature extends Feature
{
    public function handle(DeletePost $request)
    {
        $result = $this->run(DeletePostJob::class, [
            'post_id' => $request->input('post_id')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Post deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Post could not be deleted properly. Check post ID.'
        ]));
    }
}
