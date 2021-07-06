<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find(int $notification_id)
 * @method static findOrFail($post_id)
 * @method static where(string $string, string $string1, $id)
 * @method static create(array $array)
 */
class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'thread_id',
        'user_id'
    ];

    protected $appends = [
        'thread_title'
    ];

    protected $hidden = [
        'thread',
        'updated_at'
    ];

    public function getThreadTitleAttribute()
    {
        return $this->thread->title;
    }

    /**
     * Notification belongs to a User
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Notification belongs to a Thread
     *
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }
}
