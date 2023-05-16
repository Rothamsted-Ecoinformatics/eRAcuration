<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\RelatedIdentifier;
use App\Models\RelationType;


class RelatedIdentifiers extends Component
{
    public $dataset;
    public $relation_type_id;
    public $relation_types;
    public $identifier = '';
    public $name = '';
    public $identifier_type = 'DOI';
    public $dataset_id;

    protected $rules = [
        'identifier' => 'required|max:100',
        'name' => 'required|max:100',
        'relation_type_id' => 'required',
        'identifier' => 'required',
        'identifier_type' =>'required'

    ];

    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->relation_types = RelationType::where('is_visible', 1)->get();

    }

    public function refresh() {

        $this->dataset = Dataset::find($this->dataset_id);
        //$this->relation_types = RelationType::all()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        $this->relation_types = RelationType::where('is_visible', 1)->get();
        $this->identifier = '';
        $this->name = '';
    }

    public function addRelatedIdentifier() {

        $this->validate();

        $rel_id = new RelatedIdentifier;
        $rel_id->metadata_document_id = $this->dataset_id;
        $rel_id->relation_type_id = $this->relation_type_id;
        $rel_id->identifier = $this->identifier;
        $rel_id->name = $this->name;
        $rel_id->identifier_type_id = $this->identifier_type;
        $rel_id->save();
        $this->refresh();
    }



    public function removeRelatedIdentifier($id)
    {
        $deletedID = RelatedIdentifier::find($id)->delete();

        $this->refresh();

    }

    public function render()
    {
        return view('livewire.input.related-identifiers');
    }
}
