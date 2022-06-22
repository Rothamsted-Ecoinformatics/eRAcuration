<?php

namespace App\Http\Livewire;


use Livewire\Component;

use App\Models\Image;
use App\Models\ImageType;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

use function Ramsey\Uuid\v1;

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

                //TO DO here, try to extractthe list of experiments in a bettrway. 
                Column::name('experiment.code')
                -> label('Experiment')
                /*-> filterable($this->code),
                */
                ->filterable([
                'R/AG/6',
                'R/BK/1',
'R/BN/7',
'R/CS/1',
'R/CS/10',
'R/CS/13',
'R/CS/14',
'R/CS/2',
'R/CS/326',
'R/CS/408',
'R/CS/477',
'R/CS/6',
'R/CS/683',
'R/CS/684',
'R/CS/767',
'R/EX/4',
'R/GC/8',
'R/HB/2',
'R/MA/1',
'R/P/5',
'R/PG/5',
'R/RA/1',
'R/RN/1',
'R/RN/11',
'R/RN/2',
'R/RN/5',
'R/RN/7',
'R/RN/8',
'R/RN/9',
'R/RS/1',
'R/RS/2',
'R/RS/5',
'R/RS/9',
'R/WF/3',
'R/WW/3',
'S/RN/1',
'S/RN/2',
'W/CS/10',
'W/CS/326',
'W/CS/427',
'W/CS/428',
'W/CS/439',
'W/CS/478',
'W/RN/15',
'W/RN/3',
'W/RN/4',
'X1',
'X10',
'X11',
'X13',
'X14',
'X2',
'X3',
'X4',
'X5',
'W/XW/6',
'X8',
'RMS',
'R/BB/1',
'R/RO',
'R/GE/9',
'WMS',
'SMS',
'BMS',
'W/RN/12',
'R/BK/1/W',
'DOCS',
'W/RN/13',
'BB/2',
'W/XB/6',
'RRES',
'WOB'
                ]),
                
            Column::name('file_location')
            -> label('File Location')
            ->hide(),

            Column::name('filename')
            -> label('File Name'),

            Column::name('image_type.image_type')
            -> label('Image Type'),
          //-> filterable(['600X400', 'banners', 'metadata', 'people'])

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
            
            Column::callback(['URL'], function ($URL ) {
                return view('images.callback', ['URL' => $URL]);
            })
            ->label('Thumbnail (TEST)')
            ->unsortable(),
*/
            BooleanColumn::name('is_www')
                -> label('For www'),

        
            BooleanColumn::name('is_reviewed')
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
