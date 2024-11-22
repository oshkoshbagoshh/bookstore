<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ROLES
    const ROLE_ADMIN = 'admin';
    const ROLE_REVIEWER = 'reviewer';
    const ROLE_CUSTOMER = 'customer';

    public function getRoleOptions(): array
    {
        return [
            self::ROLE_ADMIN,
            self::ROLE_REVIEWER,
            self::ROLE_CUSTOMER,
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            if (!in_array($user->role, $user->getRoleOptions())) {
                throw new \InvalidArgumentException('Invalid role specified');
            }
        });
    }

    public function isAdmin(): {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isReviewer(){
        return $this->role === self::ROLE_REVIEWER;
    }

}
