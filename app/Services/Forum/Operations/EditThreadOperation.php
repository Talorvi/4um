<?php

namespace App\Services\Forum\Operations;

use App\Domains\Tag\Jobs\FindOrCreateTagJob;
use App\Domains\Tag\Jobs\RemoveUnusedTagsJob;
use App\Domains\Thread\Jobs\EditThreadJob;
use App\Domains\Thread\Requests\EditThread;
use Lucid\Units\Operation;

class EditThreadOperation extends Operation
{
    private EditThread $request;

    /**
     * Create a new operation instance.
     *
     * @param EditThread $request
     */
    public function __construct(EditThread $request)
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
        $thread = $this->run(EditThreadJob::class, [
            'title'     => $this->request->input('title'),
            'text'      => $this->request->input('text'),
            'thread_id' => $this->request->input('thread_id'),
            'user'      => $this->request->user()
        ]);

        if ($thread) {
            $thread->tags()->detach();

            if ($this->request->input('tags')) {
                foreach ($this->request->input('tags') as $tag_name) {
                    $tag = $this->run(FindOrCreateTagJob::class, [
                        'tag_name' => $tag_name
                    ]);
                    $thread->tags()->attach($tag->id);
                }
            }

            $thread->save();

            $this->run(RemoveUnusedTagsJob::class);

            return true;
        }

        return false;
    }
}
