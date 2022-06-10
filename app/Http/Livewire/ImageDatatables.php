<?php

namespace App\Http\Livewire;


use Livewire\Component;

use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class ImageDatatables extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;
    
    
    public $model = Image::class;
  
    
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
                -> link('images/{{id}}/edit', '{{id}}'),

                Column::name('exptID')
                -> label('Experiment')
                
                ->filterable(['bms',
                'broomsbarn',
                'det',
                'met',
                'NorthWyke',
                'others',
                'rag6',
                'rbk1',
                'rbk1w',
                'rbn7',
                'rex4',
                'rgc8',
                'rhb2',
                'rms',
                'rothamsted',
                'rpg5',
                'rrn1',
                'rrn2',
                'rwcs10',
                'rwf3',
                'wilderness',
                'woburn',
                'wrn3']),
                
            Column::name('fileLocation')
            -> label('File Location')
            ->hide(),

            Column::name('filename')
            -> label('File Name'),

            Column::name('imageType')
            -> label('Image Type')
            -> filterable(['600X400', 'banners', 'metadata', 'people']),
          

            Column::name('caption')
                -> label('Caption')
                -> truncate(30)
                -> editable(),

            Column::name('description')
                -> label('Description')
                -> truncate(30)
                -> hide(),        
            /*
            Column::callback(['filename', 'imageType', 'exptID'], function ($filename,  $imageType, $exptID) {
                    return view('images.image-display', ['filename' => $filename, 'imageType' => $imageType, 'exptID' => $exptID ]);
                })
                ->label('Thumbnail (DEV - ONLINE)')
                ->unsortable(),
            */
            Column::callback(['URL'], function ($URL ) {
                return view('images.callback', ['URL' => $URL]);
            })
            ->label('Thumbnail (TEST)')
            ->unsortable(),

            BooleanColumn::name('forWWW')
                -> label('For galleries')
                ,
            BooleanColumn::name('isReviewed')
                -> label('Reviewed?'),

            NumberColumn::name('width')
                -> label('Width')
                -> hide(),

            NumberColumn::name('height')
                -> label('Height')
                -> hide(),

                Column::name('orientation')
                -> label('Orientation')
                -> filterable(['Lanscape', 'Portrait'])

        ];
    }
    
}
