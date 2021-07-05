<?php

namespace App\Services\Forum\Features\Post;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Post\Jobs\GetPostJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetPostFeature extends Feature
{
    public function handle(Request $request)
    {
        $post = $this->run(GetPostJob::class, [
            'post_id' => $request->input('post_id')
        ]);

        if($post) {
            return $this->run(new RespondWithJsonJob($post));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Post could not be printed properly. Check post ID.'
        ]));
    }
}
