<?php
namespace App\Http\Livewire;


use Livewire\Component;

use App\Models\Dataset;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatasetDatatables extends LivewireDatatable
{
    
    public $hideable = 'select';
    public $exportable = true;
    
   
    
    public $model = Dataset::class;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID')
                -> sortBy('id')
                -> link('datasets/{{id}}', '{{id}}'),

            NumberColumn::name('isReady')
                -> label('Ready')
                -> editable(),
            
            NumberColumn::name('md_id')
                -> label('MD_ID')
                -> hide(),

            Column::name('identifier')
            -> label('Identifier')
            -> filterable(),

            Column::name('experiment.experiment_code')
            -> label('Experiment')
            -> filterable (),

          
            Column::name('dstype')
            -> label('Dataset Access')
            -> filterable(['OA', 'Other']),

            Column::name('short_name')
            -> label('Dataset')
            -> filterable(),

            NumberColumn::name('publication_year')
            -> label('Year'),
            
            Column::name('URL')
            ->label('URL'),

            Column::name('title')
            ->label('title')
            -> editable()

        ];
    }

    
}
