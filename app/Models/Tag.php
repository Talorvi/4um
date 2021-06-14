<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static find(int $tag_id)
 */
class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Many Tags belong to many Threads
     *
     * @return BelongsToMany
     */
    public function threads(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Thread', 'tag_thread')->withTimestamps();
    }
}
