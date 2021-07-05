<?php

namespace App\Events;

use App\Models\Notification;
use App\Models\Post;
use Carbon\Carbon;
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
    public string $thread_title;
    public int $thread_author_id;
    public int $post_author_id;
    public Carbon $created_at;

    public function __construct(string $message, Post $post)
    {
        $this->message = $message;
        $this->thread_id = $post->thread_id;
        $this->thread_title = $post->thread->title;
        $this->thread_author_id = $post->thread->user_id;
        $this->post_author_id = $post->user_id;
        $this->created_at = Carbon::now();

        Notification::create([
            'message' => $this->message,
            'thread_id' => $this->thread_id,
            'user_id' => $this->thread_author_id
        ]);
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
