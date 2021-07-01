<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public int $thread_id;
    public int $thread_author_id;
    public int $post_author_id;

    public function __construct(string $message, int $thread_id, int $thread_author_id, int $post_author_id)
    {
        $this->message = $message;
        $this->thread_id = $thread_id;
        $this->thread_author_id = $thread_author_id;
        $this->post_author_id = $post_author_id;
    }

    public function broadcastOn(): array
    {
        return ['notification-'.$this->thread_author_id];
    }

    public function broadcastAs(): string
    {
        return 'post-received';
    }
}
