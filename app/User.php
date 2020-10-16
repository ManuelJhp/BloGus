<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        //Un user tiene muchos posts
        return $this->hasMany(Post::class, 'user_id');
    }

    public function scopeAllowed($query)
    {
        //Si es admin, mostramos todos
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }
        //Si no es admin, mostramos solo los post que sean suyos
        return $query->where('id', auth()->id());
    }

    public function getRoleDisplayNames()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
}
