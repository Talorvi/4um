<?php

namespace App\Services\Forum\Features\Post;

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

        return $this->run(new RespondWithJsonJob($post));
    }
}
