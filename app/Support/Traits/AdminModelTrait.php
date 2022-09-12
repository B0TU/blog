<?php

namespace App\Support\Traits;
use Spatie\Activitylog\LogOptions;

trait AdminModelTrait
{
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }

    public function getAdminLinkAttribute()
    {
        $model_class = str($this->getMorphClass())->plural()->kebab();
        return "<a href=' " . route("admin.{$model_class}.show", $this) . " '>" . $this->admin_name . "</a>";
    }

    public function getAdminNameAttribute()
    {
        return $this->name;
    }
}