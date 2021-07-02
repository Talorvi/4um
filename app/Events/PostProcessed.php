<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostProcessed implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public int $post_id;
    public int $post_author_id;
    public int $thread_author_id;

    public function __construct(string $message, int $post_id, int $post_author_id, int $thread_author_id)
    {
        $this->message = $message;
        $this->post_id = $post_id;
        $this->thread_author_id = $thread_author_id;
        $this->post_author_id = $post_author_id;
    }

    public function broadcastOn(): array
    {
        return ['processed-posts-'.$this->post_author_id];
    }

    public function broadcastAs(): string
    {
        return 'post-processed';
    }
}
