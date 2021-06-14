<?php

namespace App\Services\Forum\Features\Tag;

use App\Domains\Tag\Jobs\AddTagJob;
use App\Domains\Tag\Requests\AddTag;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class AddTagFeature extends Feature
{
    public function handle(AddTag $request)
    {
        $post = $this->run(AddTagJob::class, [
            'name' => $request->input('name')
        ]);

        return $this->run(new RespondWithJsonJob($post));
    }
}
