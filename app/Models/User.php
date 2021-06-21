<?php

namespace App\Models;

use App\Support\Enum\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JetBrains\PhpStorm\Pure;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Parental\HasChildren;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasChildren;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected array $childTypes = [
        UserType::ADMIN => Admin::class,
        UserType::STUDENT => Student::class,
        UserType::WRITER => Writer::class,
    ];

    #[Pure]
    public function getRoleAttribute(): string
    {
        return UserType::role($this->type);
    }

    #[Pure]
    public function hasRole(string $role): bool
    {
        return in_array($role, UserType::roles()) && $role === $this->type;
    }

    public function isAdmin(): bool
    {
        return $this->type === UserType::ADMIN;
    }

    function dashboard(): string
    {
        return url('/');
    }
}
