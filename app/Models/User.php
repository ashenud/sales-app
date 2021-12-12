<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /** 
    * Set the default role of a user as a guest user when registering on the web
    */
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (!$user->roles()->get()->contains(config('salesapp.role_guest'))) {
                $user->roles()->attach(config('salesapp.role_guest'));
            }
        });
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function sales_representatives() {
        return $this->hasMany(SalesRepresentative::class, 'manager_id');
    }
}
