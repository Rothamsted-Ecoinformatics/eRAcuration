<?php

namespace App\Http\Livewire\Eratables;

use Livewire\Component;
use App\Models\User;
use illuminate\Support\Str;
use Mediconesystems\LivewireDatatables;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class UserDatatables extends LivewireDatatable
{
    public $model = User::class;
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),
  
            Column::name('name')
                ->label('Name'),
  
                Column::name('email')
                ->label('Email'),
  
            DateColumn::name('created_at')
                ->label('Joined')
        ];
    }
     
}
