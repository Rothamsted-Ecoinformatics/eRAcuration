<?php

namespace App\Http\Livewire\Eramangatables;

use Livewire\Component;
use App\Models\Download;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DownloadDatatables extends LivewireDatatable
{


    public $hideable = 'select';
    public $exportable = true;

    public $persistComplexQuery = true;
    public function builder()
    {
        return Download::where('dlresult','LIVE');
    }


    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID'),

            DateColumn::name('dldate')
                ->label('Date')
                ,
            Column::name('DOI')
                ->label('DOI')
                ->filterable(),
            Column::name('IP')
                ->label('IP'),
            Column::name('fullname')
                -> label('Full Name'),

            Column::name('country')
                -> label('Country'),
            Column::name('institution')
                -> label('Institution'),

                Column::name('information')
                -> label('Information'),
        ];
    }

}
