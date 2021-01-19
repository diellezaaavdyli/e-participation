<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class UsersTable.
 */
class UsersTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'name';

    /**
     * @var string
     */
    public $status;

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $user = auth()->user();
        $query = User::with('roles');

        if($user->isDirector()){
            $query->principals();
            $query->where('city_id', $user->city_id);
        }

        if($user->isPrincipal()){
            $query->teachers();
            $query->where('school_id', $user->school_id);
        }

        if ($this->status === 'deleted') {
            return $query->onlyTrashed();
        }

        if ($this->status === 'deactivated') {
            return $query->onlyDeactivated();
        }

        return $query->onlyActive();
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('translator.label_type'))
                ->view('backend.auth.user.includes.type', 'user')
                ->sortable(),
            Column::make(__('translator.label_name'))
                ->searchable()
                ->sortable(),
            Column::make(__('translator.label_email'), 'email')
                ->searchable()
                ->sortable(),
            Column::make(__('translator.label_verified'))
                ->view('backend.auth.user.includes.verified', 'user')
                ->sortable(function ($builder, $direction) {
                    return $builder->orderBy('email_verified_at', $direction);
                }),
            Column::make(__('translator.label_roles'), 'roles_label')
                ->customAttribute()
                ->html()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('roles', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make(__('translator.label_additional_permissions'), 'permissions_label')
                ->customAttribute()
                ->html()
                ->searchable(function ($builder, $term) {
                    return $builder->orWhereHas('permissions', function ($query) use ($term) {
                        return $query->where('name', 'like', '%'.$term.'%');
                    });
                }),
            Column::make(__('translator.label_actions'))
                ->view('backend.auth.user.includes.actions', 'user'),
        ];
    }
}
