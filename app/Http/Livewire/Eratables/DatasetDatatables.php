<?php
namespace App\Http\Livewire\Eratables;


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
    //public $model = Dataset::class;
    public $with = "experiment.name, general_resource_type.type_value, specific_resource_type.type_value";
    public $searchable="identifier, title, short_name, experiment.code";
    public $token = " ";

    /**
     * Write code on Method
     *
     * @return response()
     */

/*
     $users = DB::table('users')
     ->join('contacts', 'users.id', '=', 'contacts.user_id')
     ->join('orders', 'users.id', '=', 'orders.user_id')
     ->select('users.*', 'contacts.phone', 'orders.price')
     ->get();

     */
    public function builder()
    {
        return Dataset::query()
        ->leftJoin('experiments', 'experiments.id', 'metadata_documents.experiment_id')
        ->leftJoin('general_resource_types', 'general_resource_types.id', 'metadata_documents.general_resource_type_id')
        ->leftJoin('specific_resource_types', 'specific_resource_types.id', 'metadata_documents.specific_resource_type_id');
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID')
                -> sortBy('id')
                -> link('datasets/{{id}}', '{{id}}'),

            NumberColumn::name('is_ready')
                -> label('Ready')
                -> editable(),

            Column::name('identifier')
            -> label('Identifier')
            -> filterable(),

            Column::name('experiment.code')
            -> label('Experiment')
            -> exportCallback(function ($token) {
                return 'testing';
            }),


            Column::name('short_name')
            -> label('Dataset')
            -> filterable(),

            Column::name('version')
            -> label('Version')
            -> filterable(),

            Column::name('dataset_type')
            -> label('Dataset Access')
            -> filterable(['Frictionless','OA', 'Other']),

            NumberColumn::name('publication_year')
            -> label('Year'),

            Column::name('title')
            ->label('title')
            -> editable(),

            Column::name('general_resource_type.type_value')
            -> label('General Resource Type'),

            Column::name('specific_resource_type.type_value')
            -> label('Specific Resource Type')

        ];
    }


}
