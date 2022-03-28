<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Business_Post extends Model
{
    use HasFactory;
    public $table = 'business_posts';
    protected $fillable = ['slug','title', 'category','job_content', 'job_requirements', 'job_offer','job_salary','job_type','business_link','city', 'user_id'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
