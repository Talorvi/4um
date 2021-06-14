<?php

namespace App\Services\Forum\Features\Tag;

use App\Domains\Tag\Jobs\GetTagJob;
use Illuminate\Http\Request;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class GetTagFeature extends Feature
{
    public function handle(Request $request)
    {
        $tag = $this->run(GetTagJob::class, [
            'tag_id' => $request->input('tag_id')
        ]);

        return $this->run(new RespondWithJsonJob($tag));
    }
}
