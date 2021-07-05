<?php

namespace App\Services\Forum\Operations;

use App\Domains\Post\Jobs\AddPostJob;
use App\Domains\Post\Jobs\ProcessPostJob;
use App\Domains\Post\Requests\AddPost;
use Lucid\Units\Operation;

class AddPostOperation extends Operation
{
    private AddPost $request;

    /**
     * Create a new operation instance.
     *
     * @param AddPost $request
     */
    public function __construct(AddPost $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the operation.
     *
     * @return void
     */
    public function handle()
    {
        $post = $this->run(AddPostJob::class, [
            'text' => $this->request->input('text'),
            'user' => $this->request->user(),
            'thread_id' => $this->request->input('thread_id')
        ]);

        $this->run(ProcessPostJob::class, [
            'post' => $post
        ]);

        return $post;
    }
}
