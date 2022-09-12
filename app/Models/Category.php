<?php

namespace App\Models;

use App\Support\Traits\AdminModelTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use LogsActivity;
    use AdminModelTrait;

    protected $fillable = [
        'name',
        'color',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id')->where('state', 'approved');
    }

    public static function boot()
    {
        parent::boot();

        static::saving( function(Category $category) {
            $category->slug = str($category->name)->slug();
        });
    }

    public function scopeSearch($query, $search)
    {
        $query->where("name", "like", "%" . $search . "%");
    }

    // public function scopeApproved($query)
    // {
    //     return $query->where('state', '=', 'approved');
    // }
}