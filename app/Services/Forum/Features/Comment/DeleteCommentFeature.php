<?php

namespace App\Services\Forum\Features\Comment;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Comment\Jobs\DeleteCommentJob;
use App\Domains\Comment\Requests\DeleteComment;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeleteCommentFeature extends Feature
{
    public function handle(DeleteComment $request)
    {
        $result = $this->run(DeleteCommentJob::class, [
            'comment_id' => $request->input('comment_id')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Comment deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'comment_id' => 'Comment could not be deleted properly. Check comment ID.'
        ]));
    }
}
