<?php

namespace App\Http\Livewire;



use Livewire\Component;

use App\Models\Subject;
use App\Models\SubjectSchema;
use illuminate\Support\Str;
use Mediconesystems\LivewireDatatables;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;






class SubjectDatatables extends LivewireDatatable
{
    public $model = Subject::class;
    public $hideable = 'select';
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;
    
    public $with = "subject_schemas";

   
    public function columns()
    {
        /*
id
subject_schemas_id
subject
uri
        */
        return [
            NumberColumn::name('id')
                -> label('ID')
                -> link('subjects/{{id}}', '{{id}}'),

            Column::name('subject')               
                ->label('Keyword'), 
                
            Column::name('uri')
                ->label('Subject ID'),
                
            Column::name('subject_schemas.name')
                -> label('Schema'),
        ];
    }
     public function getSchemasProperty()
    {
        return SubjectSchema::distinct()
        ->pluck('name');
    }
}