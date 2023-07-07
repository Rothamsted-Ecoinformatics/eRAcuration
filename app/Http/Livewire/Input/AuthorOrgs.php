<?php

namespace App\Http\Livewire\Input;

use App\Models\Dataset;
use App\Models\Organisation;
use Livewire\Component;

class AuthorOrgs extends Component
{
    public $authorOrg;

    public $dataset;

    public $dataset_id;

    public $dsAuthorOrgs;

    public $dsAuthorsOrgsIDs;

    public $allAuthorOrgs;

    public $filteredAuthorOrgs;

    public function mount()
    {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsAuthorOrgs = Dataset::where('id', $this->dataset_id)->first()->authorOrgs()->get();
        $this->dsAuthorsOrgsIDs = Dataset::where('id', $this->dataset_id)->first()->authorOrgs()->pluck('organisations.id')->toArray();
        $this->allAuthorOrgs = Organisation::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
        $this->filteredAuthorOrgs = Organisation::all()->whereNotIn('id', $this->dsAuthorsOrgsIDs)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function refresh()
    {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsAuthorOrgs = Dataset::where('id', $this->dataset_id)->first()->authorOrgs()->get();
        $this->dsAuthorsOrgsIDs = Dataset::where('id', $this->dataset_id)->first()->authorOrgs()->pluck('organisations.id')->toArray();
        $this->allAuthorOrgs = Organisation::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
        $this->filteredAuthorOrgs = Organisation::all()->whereNotIn('id', $this->dsAuthorsOrgsIDs)->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function addAuthorOrg()
    {
        $this->dataset->authorOrgs()->attach($this->authorOrg);
        $this->refresh();
    }

    public function removeAuthorOrg($id)
    {
        $this->dataset->authorOrgs()->detach($id);
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.input.author-orgs');
    }
}
