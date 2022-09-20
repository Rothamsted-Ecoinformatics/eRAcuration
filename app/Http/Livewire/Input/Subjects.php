<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\Subject;

class Subjects extends Component
{
    public $subject;
    public $allSubjects;
    public $dataset;
    public $dataset_id;

    public function mount($dataset_id) {
        $this->dataset = Dataset::find($dataset_id);
        $this->allSubjects = Subject::all()->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);

    }
    public function removeSubject($subject)
    {
        //

    }

    public function render()
    {
        return view('livewire.input.subjects');
    }
}
