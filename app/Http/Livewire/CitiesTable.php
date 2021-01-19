<?php

namespace App\Http\Livewire;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class CitiesTable.
 */
class CitiesTable extends TableComponent
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
        return City::query();
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Name'))
                ->searchable()
                ->sortable(),
            Column::make(__('Actions'))
                ->view('backend.city.includes.actions'),
        ];
    }
}
