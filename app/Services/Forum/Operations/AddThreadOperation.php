<?php

namespace App\Services\Forum\Operations;

use App\Domains\Tag\Jobs\FindOrCreateTagJob;
use App\Domains\Thread\Jobs\AddThreadJob;
use App\Domains\Thread\Requests\AddThread;
use App\Models\Thread;
use Lucid\Units\Operation;

class AddThreadOperation extends Operation
{
    private AddThread $request;

    /**
     * Create a new operation instance.
     *
     * @param AddThread $request
     */
    public function __construct(AddThread $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the operation.
     *
     * @return Thread
     */
    public function handle(): Thread
    {
        $thread = $this->run(AddThreadJob::class, [
            'title' => $this->request->input('title'),
            'text'  => $this->request->input('text'),
            'user'  => $this->request->user()
        ]);

        if ($this->request->input('tags')) {
            foreach ($this->request->input('tags') as $tag_name) {
                $tag = $this->run(FindOrCreateTagJob::class, [
                    'tag_name' => $tag_name
                ]);
                $thread->tags()->attach($tag->id);
            }
        }
        $thread->save();

        return $thread;
    }
}
