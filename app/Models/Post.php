<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Support\Enums\PostState;
use App\Support\Traits\AdminModelTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use LogsActivity;
    use AdminModelTrait;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category_id'
    ];

    protected $casts = [
        'state' => PostState::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating( function(Post $post) {
            $post->state = PostState::Draft;
        });

        static::saving( function(Post $post) {
            $post->slug = str($post->title)->slug();
        });
    }

    public function scopeSearch($query, $search)
    {
        $query->where("title", "like", "%" . $search . "%");
    }
    
    public function scopeScopeToCurrentUser($query)
    {
        if (auth()->user()->can('view others posts')) {
            return $query;
        }

        $query->where('author_id', '=', request()->user()->id);
    }

    public function scopeApproved($query)
    {
        return $query->where('state', '=', 'approved');
    }

    public function getAdminNameAttribute()
    {
        return $this->title;
    }

    public function getFormattedStatusAttribute(){
        return Str::title($this->state->name);
    }

    public function getIsDraftAttribute()
    {
        return $this->state == PostState::Draft;
    }

    public function getIsPendingAttribute()
    {
        return $this->state == PostState::Pending;
    }

    public function getIsApprovedAttribute()
    {
        return $this->state == PostState::Approved;
    }

    /** Action */

    public function draft() {
        $this->state = PostState::Draft;
        $this->save();
    }

    public function pending() {
        $this->state = PostState::Pending;
        $this->save();
    }
    
    public function approve() {
        $this->state = PostState::Approved;
        $this->save();
    }


}
