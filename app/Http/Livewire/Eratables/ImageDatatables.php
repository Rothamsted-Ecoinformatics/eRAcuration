<?php

namespace App\Http\Livewire\Eratables;


use Livewire\Component;

use App\Models\Image;
use App\Models\ImageType;
use App\Models\Experiment;

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
    public $model = Image::class;

    public $with = "experiment, author";
    public $hideable = 'select';

    //public $complex = true;
    //public $persistComplexQuery = true;





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

                //TO DO here, try to extract the list of experiments in a better way.
            Column::name('experiment_code')
                -> label('Folder')
                -> filterable($this->folders),


            Column::name('file_location')
            -> label('File Location')
            -> hide(),

            Column::name('filename')
            -> label('File Name'),

            Column::name('image_type.image_type')
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

            Column::name('author.given_name')
                -> label('Author'),

            Column::name('author.family_name')
                -> label('Author2'),
            Column::callback(['file_location'], function ($file_location  ) {
                return view('images.callback', ['file_location' => $file_location]);
            })
            ->label('on WWW')
            ->unsortable(),

            BooleanColumn::name('is_www')
                -> label('For Media tab')
                -> editable(),


            BooleanColumn::name('is_reviewed')
                -> label('Reviewed?')
                -> filterable(),

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
    // if I want a Property Named Codes, I make a function called getCodesProperty!
    public function getFoldersProperty()
    {
        return Experiment::distinct()
        ->pluck('folder');
    }

}
