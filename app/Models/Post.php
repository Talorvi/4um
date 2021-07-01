<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $post_id)
 * @method static find(int $post_id)
 * @method static create(array $array)
 * @method static where(string $string, string $string1, bool $true)
 * @property int|mixed accepted
 * @property mixed id
 */
class Post extends Model
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
        'thread_id',
        'accepted'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['number_of_comments', 'author', 'comments'];

    /**
     * Gets the number of comments of certain Thread
     *
     * @return int
     */
    public function getNumberOfCommentsAttribute(): int
    {
        return $this->getNumberOfComments();
    }

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
     * Gets Comments associated with the Post
     *
     * @return Collection
     */
    public function getCommentsAttribute(): Collection
    {
        return $this->comments()->get();
    }

    /**
     * Post belongs to a Thread
     *
     * @return BelongsTo
     */
    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    /**
     * Post belongs to a user
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Post has many Comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Gets the number of Comments
     * @return int
     */
    private function getNumberOfComments(): int
    {
        return $this->comments()->count();
    }
}
