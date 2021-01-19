<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class StudentsTable.
 */
class StudentsTable extends TableComponent
{
    /**
     * @var string
     */
    public $sortField = 'first_name';

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Student::query();
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('First Name'))
                ->searchable()
                ->sortable(),
            Column::make(__('Last Name'))
                ->searchable()
                ->sortable(),
            Column::make(__('Gender'))
                ->sortable(),
            Column::make(__('Disabilities'))
                ->sortable(),
            Column::make(__('Foster Care'))
                ->sortable(),
            Column::make(__('Social Assistance'))
                ->sortable(),
            Column::make(__('Actions'))
                ->view('backend.student.includes.actions'),
        ];
    }
}
