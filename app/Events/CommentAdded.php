<?php

namespace App\Events;

use App\Models\Comment;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentAdded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;
    public int $post_id;
    public int $post_author_id;
    public int $thread_id;
    public string $thread_title;
    public int $comment_author_id;
    public Carbon $created_at;

    public function __construct(string $message, Comment $comment)
    {
        $this->message = $message;
        $this->post_id = $comment->post_id;
        $this->post_author_id = $comment->post->user_id;
        $this->thread_id = $comment->post->thread_id;
        $this->thread_title = $comment->post->thread->title;
        $this->comment_author_id = $comment->user_id;
        $this->created_at = Carbon::now();

        Notification::create([
            'message' => $this->message,
            'thread_id' => $this->thread_id,
            'user_id' => $this->post_author_id
        ]);
    }

    public function broadcastOn(): array
    {
        return ['notification-'.$this->post_author_id];
    }

    public function broadcastAs(): string
    {
        return 'comment-received';
    }
}
