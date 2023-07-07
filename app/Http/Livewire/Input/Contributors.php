<?php

namespace App\Http\Livewire\Input;

use App\Models\Dataset;
use App\Models\Person;
use App\Models\PersonRoleType;
use Livewire\Component;

class Contributors extends Component
{
    public $person_id;

    public $person_role_type_id;

    public $dataset;

    public $dataset_id;

    public $dsContributors;

    public $dsContributorsIDs;

    public $person_role_types;

    public $filteredPersons;

    protected $rules = [
        'person_role_type_id' => 'required',
        'person_id' => 'required',

    ];

    public function mount()
    {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsContributors = Dataset::where('id', $this->dataset_id)->first()->contributors()->get();
        $this->person_role_types = PersonRoleType::all();
        $this->dsContributorsIDs = Dataset::where('id', $this->dataset_id)->first()->contributors()->pluck('persons.id')->toArray();

        $this->filteredPersons = Person::all()->whereNotIn('id', $this->dsContributorsIDs)->sortBy('family_name', SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function refresh()
    {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsContributors = Dataset::where('id', $this->dataset_id)->first()->contributors()->get();
        $this->person_role_types = PersonRoleType::all();
        $this->dsContributorsIDs = Dataset::where('id', $this->dataset_id)->first()->contributors()->pluck('persons.id')->toArray();
        $this->filteredPersons = Person::all()->whereNotIn('id', $this->dsContributorsIDs)->sortBy('family_name', SORT_NATURAL | SORT_FLAG_CASE);
    }

    public function addContributor()
    {
        $this->validate();

        $this->dataset->contributors()->attach($this->person_id, ['person_role_type_id' => $this->person_role_type_id]);
        $this->refresh();
    }

    public function removeContributor($id)
    {
        $this->dataset->contributors()->detach($id);
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.input.contributors');
    }
}
