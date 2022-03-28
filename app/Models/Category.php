<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    public $table = 'categories';
    protected $fillable = ['parent_id', 'name', 'slug'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category');
    }
    public function business_posts(): HasMany
    {
        return $this->hasMany(Business_Post::class, 'category');
    }
}
