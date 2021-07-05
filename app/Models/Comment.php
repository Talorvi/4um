<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find(int $comment_id)
 * @method static findOrFail(int $comment_id)
 * @property mixed post
 * @property mixed post_id
 * @property mixed user_id
 */
class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'author'
    ];

    /**
     * Gets the author
     *
     * @return Collection
     */
    public function getAuthorAttribute(): Collection
    {
        return $this->author()->get()->makeHidden([
            'number_of_threads_followed',
            'number_of_votes',
            'number_of_comments',
        ]);
    }

    /**
     * Comment belongs to a Post
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Comment belongs to a user
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
