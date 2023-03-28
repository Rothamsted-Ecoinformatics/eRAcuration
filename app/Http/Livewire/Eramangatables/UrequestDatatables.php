<?php
namespace App\Http\Livewire\Eramangatables;

use Livewire\Component;
use App\Models\Urequest;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UrequestDatatables extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;
    public $model = Urequest::class;

    public $persistComplexQuery = true;

    //another way of getting the data is to build it
    /* public function builder()
    {
        return Urequest::where('dlresult','LIVE');
    }
    */



    public function columns()
    {
        return [
            NumberColumn::name('id')
                -> label('ID'),
            DateColumn::name('reqdate')
                ->label('Date'),
            Column::name('email')
                ->label('email')
                ->filterable(),
            Column::name('fname')
                -> label('First Name'),
            Column::name('lname')
                -> label('Last Name'),
            Column::name('IP')
                ->label('IP')
                ->filterable(),
            Column::name('country')
                -> label('Country'),
            Column::name('institution')
                -> label('Institution'),
            Column::name('sector')
                -> label('Sector'),
            Column::name('Q1')
                -> label('Reason for request'),
            Column::name('Q2')
                -> label('More info on data request'),
            Column::name('ltes')
                -> label('Data requested'),
            Column::name('role')
                -> label('Role'),
            Column::name('supEmail')
                -> label('Supervisor Email'),
            Column::name('rothColls')
                -> label('Contact at Rothamsted'),
            Column::name('funding')
                -> label('Funding'),
            Column::name('ISPG')
                -> label('ISPG'),
            Column::name('allowEmails')
                -> label('Allows Emails'),
            Column::name('refer')
                -> label('Found through'),


        ];
    }

    /* public function render()
    {
        return view('livewire.eramangatables.request-datatables');
    } */
}
