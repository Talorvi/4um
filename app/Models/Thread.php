<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(int $thread_id)
 * @method static find(int $thread_id)
 * @method static create(array $array)
 * @method static where(string $string, bool $true)
 */
class Thread extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'text',
        'user_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['number_of_followers'];

    /**
     * Gets the number of users that follow this thread
     *
     * @return int
     */
    public function getNumberOfFollowersAttribute(): int
    {
        return $this->getNumberOfFollowers();
    }

    /**
     * Thread belongs to a User
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Thread has many Posts
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Thread has many Comments through Posts
     *
     * @return HasManyThrough
     */
    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    /**
     * Many Threads are followed by many Users
     *
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'thread_user')->withTimestamps();
    }

    /**
     * Gets the number of followers
     *
     * @return int
     */
    private function getNumberOfFollowers(): int
    {
        return $this->followers()->count();
    }
}
