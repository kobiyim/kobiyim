<?php

namespace App\Models\Kobiyim;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'kobiyim_users';

    protected $fillable = [
        'name',
        'phone',
        'password',
        'is_active',
        'type',
        'remember_token',
        'remember_expires_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Rolleri getir
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Rollerden gelen izinler
    public function rolePermissions()
    {
        return $this->roles->flatMap(function ($role) {
            return $role->permissions;
        });
    }

    // Kullanıcıya doğrudan atanan izinler
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission');
    }

    /**
     * Kullanıcının belirtilen izne sahip olup olmadığını kontrol eder.
     */
    public function can($permissionName)
    {
        // Doğrudan izinleri ve rollerden gelen izinleri birleştir
        $allPermissions = $this->permissions
            ->merge($this->rolePermissions())
            ->pluck('key')
            ->unique();

        return $allPermissions->contains($permissionName);
    }
    
    /**
     * Kullanıcının belirtilen role sahip olup olmadığını kontrol eder.
     *
     * @param string $roleName
     * @return bool
     */
    public function hasRole($roleName)
    {
        return $this->roles->pluck('key')->contains($roleName);
    }

    /**
     * Kullanıcının belirtilen rollerden en az birine sahip olup olmadığını kontrol eder.
     *
     * @param array $roleNames
     * @return bool
     */
    public function hasAnyRole(array $roleNames)
    {
        return $this->roles->pluck('name')->intersect($roleNames)->isNotEmpty();
    }
}
