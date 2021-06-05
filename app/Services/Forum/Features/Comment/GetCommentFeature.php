<?php

namespace App\Services\Forum\Features\Comment;

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

        return $this->run(new RespondWithJsonJob($comment));
    }
}
