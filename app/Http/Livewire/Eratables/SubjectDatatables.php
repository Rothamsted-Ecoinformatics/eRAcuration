<?php

namespace App\Http\Livewire\Eratables;

use App\Models\Subject;
use App\Models\SubjectSchema;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;



class SubjectDatatables extends LivewireDatatable
{
    //public $model = Subject::class;
    public $hideable = 'select';
    public $exportable = true;

    public $persistComplexQuery = true;

    public $with = "subject_schemas";
    public function builder()
    {
        return Subject::query()
        ->leftJoin('subject_schemas', 'subject_schemas.id', 'subjects.subject_schemas_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID'),

            Column::name('subject')
                ->label('Keyword')
                ->editable(),

            Column::name('uri')
                ->label('Subject ID')
                ->editable(),

            Column::name('subject_schemas.name')
                -> label('Schema'),
            Column::delete()->label('delete')->alignRight()->exportCallback(function ($token) {
                return 'N/A';
            })
        ];
    }
     public function getSchemasProperty()
    {
        return SubjectSchema::distinct()
        ->pluck('name');
    }
}
