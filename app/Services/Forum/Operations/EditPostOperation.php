<?php

namespace App\Services\Forum\Operations;

use App\Domains\Post\Jobs\EditPostJob;
use App\Domains\Post\Jobs\ProcessPostJob;
use App\Domains\Post\Requests\EditPost;
use Lucid\Units\Operation;

class EditPostOperation extends Operation
{
    private EditPost $request;

    /**
     * Create a new operation instance.
     *
     * @param EditPost $request
     */
    public function __construct(EditPost $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the operation.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $post = $this->run(EditPostJob::class, [
            'post_id' => $this->request->input('post_id'),
            'text'    => $this->request->input('text')
        ]);

        if ($post) {
            $this->run(ProcessPostJob::class, [
                'post' => $post
            ]);
            return true;
        }

        return false;
    }
}
