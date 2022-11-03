<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\Person;

class Authors extends Component
{


    public $author;

    public $allAuthors;
    public $dsAuthors;
    public $dsAuthorsIDs;
    public $filteredAuthors;
    public $dataset;
    public $dataset_id;


    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsAuthors = Dataset::where('id', $this->dataset_id)->first()->authors()->get();
        $this->dsAuthorsIDs = Dataset::where('id', $this->dataset_id)->first()->authors()->pluck('persons.id')->toArray();
        $this->allAuthors = Person::all()->sortBy('family-name', SORT_NATURAL|SORT_FLAG_CASE);
        $this->filteredAuthors = Person::all()->whereNotIn('id', $this->dsAuthorsIDs)->sortBy('family_name', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function refresh() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsAuthors = Dataset::where('id', $this->dataset_id)->first()->authors()->get();
        $this->dsAuthorsIDs = Dataset::where('id', $this->dataset_id)->first()->authors()->pluck('persons.id')->toArray();
        $this->allAuthors = Person::all()->sortBy('family-name', SORT_NATURAL|SORT_FLAG_CASE);
        $this->filteredAuthors = Person::all()->whereNotIn('id', $this->dsAuthorsIDs)->sortBy('family_name', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function addAuthor() {
        $this->dataset->authors()->attach($this->author);
        $this->refresh();
    }

    public function removeAuthor($id)
    {

        $this->dataset->authors()->detach($id);
        $this->refresh();

    }

    public function render()
    {
        return view('livewire.input.authors');
    }
}
