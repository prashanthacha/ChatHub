<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    /**
     * Determine whether this user is a "super" user.
     *
     * Logic: if the user has an `is_super` attribute use it. Otherwise
     * fall back to matching the env SUPER_EMAIL (convenience for projects
     * without a dedicated column).
     */
    public function isSuper(): bool
    {
        // If an `is_super` attribute exists on the model (DB column), use it.
        $attr = $this->getAttribute('is_super');

        if ($attr !== null) {
            return (bool) $attr;
        }

        // Otherwise, check SUPER_EMAIL environment variable as a fallback.
        $superEmail = env('SUPER_EMAIL');
        if ($superEmail && $this->email === $superEmail) {
            return true;
        }

        return false;
    }
}
