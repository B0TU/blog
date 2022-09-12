<?php

namespace App\Models;

use App\Support\Traits\AdminModelTrait;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use CausesActivity;
    use AdminModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        // 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving( function(User $user) {
            $user->state = 'pending';
        });
    }

    public function scopeSearch($query, $search)
    {
        $query->where("name", "like", "%" . $search . "%");
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function getRoleIdAttribute()
    {
        return $this->roles()->first()?->id;
    }

    public function getRoleNameAttribute()
    {
        return $this->roles()->first()?->name;
    }
}
