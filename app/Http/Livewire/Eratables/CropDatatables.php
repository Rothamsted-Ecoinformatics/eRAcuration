<?php

namespace App\Http\Livewire\Eratables;

//use Livewire\Component;
use App\Models\SubjectSchema;
use App\Models\vCrop;
//use illuminate\Support\Str;
//use Mediconesystems\LivewireDatatables;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
//use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class CropDatatables extends LivewireDatatable
{
    public $model = vCrop::class;

    public $hideable = 'select';

    public $exportable = true;

    public $complex = true;

    public $persistComplexQuery = true;

    //public $with = "subject_schemas";

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns(): response
    {
        /*
id
crop_name
subject_schemas_id
crop_name_uri
scientific_name
scientific_name_uri
historic_name
schema_abbrevation
schema_name
schema_uri
        */
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id')
                ->link('crops/{{id}}', '{{id}}'),

            Column::name('crop_name')
                ->label('Name'),

            Column::name('schema_name')
                ->label('Schema'),

            Column::name('crop_name_uri')
                ->link('{{crop_name_uri}}', '{{crop_name}}')
                ->label('Link to Crop Name'),

            Column::name('scientific_name')
                ->label('Scientific Name'),

            Column::name('scientific_name_uri')
                ->link('{{scientific_name_uri}}', '{{scientific_name}}')
                ->label('Link Scientific Name'),

            Column::name('historic_name')
                ->label('Historic Name'),
        ];
    }

     public function getSchemasProperty()
     {
         return SubjectSchema::distinct()
         ->pluck('name');
     }
}
