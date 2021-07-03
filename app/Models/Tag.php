<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static find(int $tag_id)
 * @method static findOrCreate(string[] $array)
 * @method static create(string[] $array)
 * @method static where(string $string, string $string1, string $tag_name)
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
