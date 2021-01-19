<?php

namespace App\Models;

use App\Models\Traits\Relationship\PermissionRelationship;
use App\Models\Traits\Scope\PermissionScope;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission
{
    /**
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(__CLASS__, 'parent_id')->with('parent');
    }

    /**
     * @return mixed
     */
    public function children()
    {
        return $this->hasMany(__CLASS__, 'parent_id')->with('children');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeIsMaster($query)
    {
        return $query->whereDoesntHave('parent')
            ->whereHas('children');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeIsParent($query)
    {
        return $query->whereHas('children');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeIsChild($query)
    {
        return $query->whereHas('parent');
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeSingular($query)
    {
        return $query->whereNull('parent_id')
            ->whereDoesntHave('children');
    }
}
