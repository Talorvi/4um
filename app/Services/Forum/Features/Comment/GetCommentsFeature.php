<?php

namespace App\Services\Forum\Features\Comment;

use App\Domains\Comment\Jobs\GetCommentsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetCommentsFeature extends Feature
{
    public function handle(Request $request)
    {
        $comments = $this->run(GetCommentsJob::class, $request);

        return $this->run(new RespondWithJsonJob($comments));
    }
}
