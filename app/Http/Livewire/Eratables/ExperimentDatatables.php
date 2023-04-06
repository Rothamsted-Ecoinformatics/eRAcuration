<?php

namespace App\Http\Livewire\Eratables;

use App\Models\Experiment;
use App\Models\SubjectSchema;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ExperimentDatatables extends LivewireDatatable
{
    public $model = Experiment::class;
    public $hideable = 'select';
    public $exportable = true;
    public $token = "N/A";
    public $persistComplexQuery = true;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID')
                -> link('experiments/{{id}}/edit', '{{id}}'),

            Column::name('name')
                ->label('Name')
                ->editable(),

            Column::name('description')
                ->label('Description')
                ->truncate(50)
                ->editable(),

            Column::name('purpose')
                ->label('Purpose')
                ->editable(),

            Column::name('code')
                ->label('Code'),

            Column::name('folder')
                -> label('folder'),

            Column::name('glten_id')
                -> label('GLTEN-ID')
                ->editable()
                ,

            Column::name('key_ref_code')
                -> label('KeyRef Code(s)')
                ->editable(),

            Column::name('start_year')
                -> label('Start Year')
                ->editable(),

            Column::name('end_year')
                -> label('End Year')
                ->editable()


        ];
    }
}
