<?php

namespace App\Models\V1;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function phone()
    {
        return $this->morphMany(Phone::class, 'phonable');
    }

    public function getAvatarAttribute()
    {
        return $this->media()->whereName('avatar')->first()->getFullUrl();
    }
}
