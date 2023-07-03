<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use MoonShine\Models\MoonshineUser;
use MoonShine\Traits\Models\HasMoonShineChangeLog;

class Article extends Model
{
    use HasFactory;
    use HasMoonShineChangeLog;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'thumbnail',
        'seo_title',
        'seo_description',
        'rating',
        'link',
        'age_from',
        'age_to',
        'active',
        'color',
        'files',
        'data',
        'code',




         'author_id'
    ];

    protected $casts = [
        'files' => 'collection',
        'data' => 'collection',
        'active' => 'bool'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function comment(): HasOne
    {
        return $this->hasOne(Comment::class)->latestOfMany();
    }
}
