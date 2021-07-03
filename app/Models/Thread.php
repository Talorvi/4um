<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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
    protected $appends = ['number_of_followers', 'score', 'number_of_posts', 'tags', 'followers', 'votes', 'author'];




    /**
     * Attributes
     */

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
     * Gets the number of upvotes
     *
     * @return int
     */
    public function getScoreAttribute(): int
    {
        return $this->getNumberOfVotes();
    }

    /**
     * Gets the number of upvotes
     *
     * @return int
     */
    public function getNumberOfPostsAttribute(): int
    {
        return $this->getNumberOfPosts();
    }

    /**
     * Gets tags
     *
     * @return array
     */
    public function getTagsAttribute(): array
    {
        return $this->getTagsArray();
    }

    /**
     * Gets users that followed this thread
     *
     * @return array
     */
    public function getFollowersAttribute(): array
    {
        return $this->followers()
            ->get(['name', 'user_id'])
            ->makeHidden([
                'number_of_threads_followed',
                'number_of_votes',
                'number_of_comments',
                'pivot'
            ])
            ->toArray();
    }

    /**
     * Gets users that voted on this thread
     *
     * @return array
     */
    public function getVotesAttribute(): array
    {
        return $this->votes()
            ->get(
                ['name']
            )
            ->makeHidden([
                'number_of_threads_followed',
                'number_of_votes',
                'number_of_comments',
                'avatar_url'
            ])
            ->toArray();
    }

    /**
     * Gets the author
     *
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
     * Relations
     */

    /**
     * Thread belongs to a User
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
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
     * Many Threads have many votes from many Users
     *
     * @return BelongsToMany
     */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'thread_user_voting')
            ->withPivot(['value'])
            ->withTimestamps();
    }

    /**
     * Many Tags belong to many Threads
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_thread')->withTimestamps();
    }




    /**
     * Functions
     */

    /**
     * Gets the number of followers
     *
     * @return int
     */
    private function getNumberOfFollowers(): int
    {
        return $this->followers()->count();
    }

    /**
     * Gets the number of votes
     *
     * @return int
     */
    private function getNumberOfVotes(): int
    {
        $upvotes = $this->votes()->wherePivot('value', '=',1)->count();
        $downvotes = $this->votes()->wherePivot('value', '=', -1)->count();
        return $upvotes - $downvotes;
    }

    /**
     * Get number of Comments
     *
     * @return int
     */
    private function getNumberOfPosts(): int
    {
        return $this->posts()->where('accepted', '=', 1)->count();
    }

    /**
     * Gets array of Tags
     *
     * @return array
     */
    private function getTagsArray(): array
    {
        return $this->tags()->get(['name'])->makeHidden(['pivot'])->toArray();
    }
}
