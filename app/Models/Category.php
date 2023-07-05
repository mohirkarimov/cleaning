<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use MoonShine\Models\MoonshineUser;

class Category extends Model
{
    use HasFactory;

//    public function author(): BelongsTo
//    {
//        return $this->belongsTo(MoonshineUser::class);
//    }
//
//    public function categories(): BelongsToMany
//    {
//        return $this->BelongsToMany(Category::class);
//    }

        public function articles(){
            return $this->hasMany(Article::class, 'category_id' , 'id');
        }
}
