<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Support\Enums\PageState;
use App\Support\Enums\PageSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'section',
        'order'
    ];

    protected $casts = [
        'state' => PageState::class,
        'section' => PageSection::class,
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function (Page $page) {
            $page->state = PageState::Unpublished;
        });

        static::saving(function (Page $page) {
            $page->slug = str($page->title)->slug();
        });
    }

    public function scopeSearch($query, $search)
    {
        return $query->where("title", "like", "%" . $search . "%");
    }

    public function scopePublished($query)
    {
        return $query->where('state', '=', 'published');
    }

    public function getFormattedStatusAttribute(){
        return Str::title($this->state->name);
    }

    public function getPublishedAttribute()
    {
        return $this->state == PageState::Published;
    }

    public function getUnpublishedAttribute()
    {
        return $this->state == PageState::Unpublished;
    }

    public function publish() {
        $this->state = PageState::Published;
        $this->save();
    }

    public function unpublish() {
        $this->state = PageState::Unpublished;
        $this->save();
    }


}
