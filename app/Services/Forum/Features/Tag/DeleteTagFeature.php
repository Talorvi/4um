<?php

namespace App\Services\Forum\Features\Tag;

use App\Domains\Authentication\Jobs\RespondWithJsonResponseErrorJob;
use App\Domains\Tag\Jobs\DeleteTagJob;
use App\Domains\Tag\Requests\DeleteTag;
use Lucid\Domains\Http\Jobs\RespondWithJsonJob;
use Lucid\Units\Feature;

class DeleteTagFeature extends Feature
{
    public function handle(DeleteTag $request)
    {
        $result = $this->run(DeleteTagJob::class, [
            'tag_id' => $request->input('tag_id')
        ]);

        if ($result) {
            return $this->run(new RespondWithJsonJob([
                'success' => 'Tag deleted successfully.'
            ]));
        }

        return $this->run(new RespondWithJsonResponseErrorJob([
            'post_id' => 'Tag could not be deleted properly. Check tag ID.'
        ]));
    }
}
