<?php

namespace App\Events;

use App\Models\Notification;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostProcessed implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public int $post_id;
    public int $thread_id;
    public string $thread_title;
    public int $post_author_id;
    public int $thread_author_id;
    public Carbon $created_at;

    public function __construct(string $message, Post $post)
    {
        $this->message = $message;
        $this->post_id = $post->id;
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
        return ['processed-posts-'.$this->post_author_id];
    }

    public function broadcastAs(): string
    {
        return 'post-processed';
    }
}
