<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Crop;
use App\Models\SubjectSchema;
use illuminate\Support\Str;
use Mediconesystems\LivewireDatatables;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class CropDatatables extends LivewireDatatable
{
    public $model = Crop::class;
    public $hideable = 'select';
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;
    
    
    
    public $with = "subject_schemas";
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        /*
subject_schemas_id
crop_name_uri
scientific_name
scientific_name_uri
historic_name
        */
        return [
            NumberColumn::name('id')
                -> label('ID')
                -> sortBy('id')
                -> link('crops/{{id}}', '{{id}}'),

            Column::name('crop_name')               
                ->label('Name'),

           

            Column::name('subject_schemas.name')
                -> label('Schema'),
                

            Column::name('crop_name_uri')
                -> link('{{crop_name_uri}}', '{{crop_name}}')
                ->label('Link to Crop Name'),
                
            Column::name('scientific_name')                
                ->label('Scientific Name'),

            Column::name('scientific_name_uri')
                -> link('{{scientific_name_uri}}', '{{scientific_name}}')
                ->label('Link Scientific Name'),
  
            Column::name('historic_name')
                ->label('Historic Name')
        ];
    }
     public function getSchemasProperty()
    {
        return SubjectSchema::distinct()
        ->pluck('name');
    }
}
