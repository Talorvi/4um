<?php

namespace App\Services\Forum\Features\Comment;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Comment\Jobs\EditCommentJob;
use App\Domains\Comment\Requests\EditComment;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class EditCommentFeature extends Feature
{
    public function handle(EditComment $request)
    {
        $result = $this->run(EditCommentJob::class, [
            'comment_id' => $request->input('comment_id'),
            'text'       => $request->input('text')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Comment edited successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'comment_id' => 'Comment could not be edited properly. Check comment ID.'
        ]));
    }
}
