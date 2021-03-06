<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static create(array $array)
 * @method static findOrFail(int $user_id)
 */
class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'media'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['number_of_threads_followed', 'number_of_votes', 'number_of_comments', 'avatar_url', 'user_roles'];

    /**
     * Gets the number of thread followed by user
     *
     * @return int
     */
    public function getNumberOfThreadsFollowedAttribute(): int
    {
        return $this->getNumberOfThreadsFollowed();
    }

    /**
     * Gets the number of thread followed by user
     *
     * @return int
     */
    public function getNumberOfVotesAttribute(): int
    {
        return $this->getNumberOfVotes();
    }

    /**
     * Gets the number of comments created by user
     *
     * @return int
     */
    public function getNumberOfCommentsAttribute(): int
    {
        return $this->getNumberOfComments();
    }

    /**
     * Gets url to users' avatar
     *
     * @return string
     */
    public function getAvatarUrlAttribute(): string
    {
        return $this->getAvatarUrl();
    }

    /**
     * Gets User Roles
     *
     * @return Collection
     */
    public function getUserRolesAttribute(): Collection
    {
        return $this->getRoleNames();
    }

    /**
     * User has many threads
     *
     * @return HasMany
     */
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Many Users follow many Threads
     *
     * @return BelongsToMany
     */
    public function followedThreads(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Thread', 'thread_user')->withTimestamps();
    }

    /**
     * Many Users may give multiple votes to a multiple Threads
     *
     * @return BelongsToMany
     */
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Thread', 'thread_user_voting')->withTimestamps();
    }

    /**
     * Gets the number of threads followed by user
     */
    private function getNumberOfThreadsFollowed(): int
    {
        return $this->followedThreads()->count();
    }

    /**
     * Gets the number of votes the User has given
     *
     * @return int
     */
    private function getNumberOfVotes(): int
    {
        return $this->votes()->count();
    }

    /**
     * User has many comments
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * User has many notifications
     *
     * @return HasMany
     */
    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Gets number of comments commited by a User
     *
     * @return int
     */
    private function getNumberOfComments(): int
    {
        return $this->comments()->count();
    }

    /**
     * Gets Users' avatar
     *
     * @return string
     */
    private function getAvatarUrl(): string
    {
        return $this->getFirstMediaUrl('avatars');
    }
}
