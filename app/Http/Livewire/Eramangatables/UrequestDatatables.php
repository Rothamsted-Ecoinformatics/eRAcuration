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

/*
Here are the fields available.
We  could put all of them and hide

>id
>email
>reqdate
>>Q1
>Q2
>ltes
>sector
>institution
>country
role
isStudent
supEmail
supName
rothColls
funding
ISPG
agreeCOU
allowEmails
IP
>fname
>lname
refer
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
            Column::name('IP')
                ->label('IP'),
            Column::name('fname')
                -> label('First Name'),
                Column::name('lname')
                -> label('Last Name'),
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
        ];
    }

    /* public function render()
    {
        return view('livewire.eramangatables.request-datatables');
    } */
}
