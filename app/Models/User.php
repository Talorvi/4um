<?php

namespace App\Models;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
    protected $appends = ['number_of_threads_followed'];

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
     * Gets the number of threads followed by user
     */
    private function getNumberOfThreadsFollowed(): int
    {
        return $this->followedThreads()->count();
    }
}
