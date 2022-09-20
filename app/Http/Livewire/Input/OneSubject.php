<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;

class OneSubject extends Component
{
    public $dataset;
    public $allSubjects;
    public $subject;
    protected $listeners = [];

    public function render()
    {
        return view('livewire.input.one-subject');
    }
}
