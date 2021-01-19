<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RolesTable.
 */
class RolesTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'name';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Role::with('permissions:id,name,description')
            ->withCount('users');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('translator.label_type'))
                ->view('backend.auth.role.includes.type', 'role')
                ->sortable(),
            Column::make(__('translator.label_name'))
                ->searchable()
                ->sortable(),
            Column::make(__('translator.label_permissions'), 'permissions_label')
                ->customAttribute()
                ->html()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('permissions', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make(__('translator.label_user_number'), 'users_count')
                ->sortable(),
            Column::make(__('translator.label_actions'))
                ->view('backend.auth.role.includes.actions'),
        ];
    }
}
