<?php

namespace App\Services\Forum\Features\Comment;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Comment\Jobs\GetCommentJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetCommentFeature extends Feature
{
    public function handle(Request $request)
    {
        $comment = $this->run(GetCommentJob::class, [
            'comment_id' => $request->input('comment_id')
        ]);

        if ($comment) {
            return $this->run(new RespondWithJsonJob($comment));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'comment_id' => 'Comment could not be printed properly. Check comment ID.'
        ]));

    }
}
