<?php

namespace App\Services\Forum\Features\Comment;

use App\Domains\Comment\Jobs\AddCommentJob;
use App\Domains\Comment\Requests\AddComment;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddCommentFeature extends Feature
{
    public function handle(AddComment $request)
    {
        $comment = $this->run(AddCommentJob::class, [
            'text' => $request->input('text'),
            'user' => $request->user(),
            'post_id' => $request->input('post_id')
        ]);

        return $this->run(new RespondWithJsonJob($comment));
    }
}
