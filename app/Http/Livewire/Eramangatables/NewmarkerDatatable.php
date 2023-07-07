<?php

namespace App\Http\Livewire\Eramangatables;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class NewmarkerDatatable extends LivewireDatatable
{
    public $model = Newmarkers::class;

    public $hideable = 'select';

    public $exportable = false;

    public $searchable = 'lname, institution, position';

    public function columns()
    {
        return [
            NumberColumn::name('nm-id')
                ->label('ID'),

            Column::name('position')
                ->label('Email'),

            Column::name('Doorbell')
                ->label('doorbell'),

            Column::name('fname')
                ->label('First Name'),

            Column::name('lname')
                ->label('Last Name'),

            Column::name('institution')
            ->label('Institution'),

            Column::name('country')
                ->label('Country'),

            Column::name('allowEmails')
                ->label('Allow Emails'),

        ];
    }
}
