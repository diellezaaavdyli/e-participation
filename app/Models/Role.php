<?php

namespace App\Models;

use App\Models\Traits\Attribute\RoleAttribute;
use App\Models\Traits\Method\RoleMethod;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role.
 */
class Role extends SpatieRole
{
    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
    ];

    /**
     * @return string
     */
    public function getPermissionsLabelAttribute(): string
    {
        if ($this->isAdmin()) {
            return 'All';
        }

        if (! $this->permissions->count()) {
            return 'None';
        }

        return collect($this->getPermissionDescriptions())
            ->implode('<br/>');
    }

    /**
     * @return mixed
     */
    public function isAdmin(): bool
    {
        return $this->name === config('boilerplate.access.role.admin');
    }

    /**
     * @return Collection
     */
    public function getPermissionDescriptions(): Collection
    {
        return $this->permissions->pluck('description');
    }
}
