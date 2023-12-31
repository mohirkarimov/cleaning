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

    public function category(){
        return $this->belongsTo(Article::class);
    }

}
