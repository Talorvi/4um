<?php

namespace App\Services\Forum\Features\Tag;

use App\Domains\Tag\Jobs\GetTagsJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetTagsFeature extends Feature
{
    public function handle(Request $request)
    {
        $tags = $this->run(GetTagsJob::class);

        return $this->run(new RespondWithJsonJob($tags));
    }
}
