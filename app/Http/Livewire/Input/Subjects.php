<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\Subject;

class Subjects extends Component
{
    public $subject;
    public $dssubjects;
    public $dssubjectsid;
    public $allSubjects;
    public $filteredSubjects;
    public $dataset;
    public $dataset_id;

    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dssubjects = Dataset::where('id', $this->dataset_id)->first()->subjects()->get();
        $this->dssubjectsid = Dataset::where('id', $this->dataset_id)->first()->subjects()->pluck('subjects.id')->toArray();
        $this->allSubjects = Subject::all()->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);
        $this->filteredSubjects = Subject::all()->whereNotIn('id', $this->dssubjectsid)->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function refresh() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dssubjects = Dataset::where('id', $this->dataset_id)->first()->subjects()->get();
        $this->dssubjectsid = Dataset::where('id', $this->dataset_id)->first()->subjects()->pluck('subjects.id')->toArray();
        $this->allSubjects = Subject::all()->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);
        $this->filteredSubjects = Subject::all()->whereNotIn('id', $this->dssubjectsid)->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function AddSubject() {
        $this->dataset->subjects()->attach($this->subject);
        $this->refresh();
    }

    public function removeSubject($id)
    {

        $this->dataset->subjects()->detach($id);
        $this->refresh();

    }

    public function render()
    {
        return view('livewire.input.subjects');
    }
}
