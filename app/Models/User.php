<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'phone',
        'state',
        'city',
        'school',
        'class',
        'user_account_type',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(
            Group::class,
            'user_has_group',
            'user_id',
            'group_id'
        );
    }

    public function isAdmin(): bool
    {
        $adminPorCargo = in_array(
            strtolower(trim((string) $this->user_account_type)),
            [
                'admin',
                'administrator',
                'administrador',
            ],
            true
        );

        if ($adminPorCargo) {
            return true;
        }

        return $this->groups()
            ->where('groups.name', 'admin')
            ->exists();
    }

    public function hasAccess(string $group): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        return $this->groups()
            ->where('groups.name', $group)
            ->exists();
    }

    public function hasAnyAccess(array $groups): bool
    {
        if ($this->isAdmin()) {
            return true;
        }

        return $this->groups()
            ->whereIn('groups.name', $groups)
            ->exists();
    }
}