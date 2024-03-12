<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\FundingAward;
class Funders extends Component
{
    public $funderID = 0;
    public $comment;
    public $dsfunderid;
    public $awards;
    public $filteredfunders;
    public $dataset;
    public $dataset_id;

    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsfunderid = Dataset::where('id',$this->dataset_id)->first()->funders()->pluck('funding_awards.id')->toArray();
        $this->awards = FundingAward::all()->whereNotIn('id',$this->dsfunderid)->sortBy('title',SORT_NATURAL|SORT_FLAG_CASE);
        //$this->awards = FundingAward::all()->sortBy('title',SORT_NATURAL|SORT_FLAG_CASE);
        // I am getting the comment from the database: this will be the list of work packages. The curator will then delete those that do not apply
        $this ->  getComment();
    }
    public function getComment()
    {
        if ($this->funderID != 0) {
            $this->comment = FundingAward::where('id',$this->funderID)->pluck('WorkPackages');
        } else {
            $this->comment = 'Delete what is not needed';
        }
    }
    public function updatedFunderID() {
        $this -> getComment();

    }



    public function refresh() {
        $this->funderID = 0;
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsfunderid = Dataset::where('id',$this->dataset_id)->first()->funders()->pluck('funding_awards.id')->toArray();
        $this->awards = FundingAward::all()->whereNotIn('id',$this->dsfunderid)->sortBy('title',SORT_NATURAL|SORT_FLAG_CASE);
        //$this->awards = FundingAward::all()->sortBy('title',SORT_NATURAL|SORT_FLAG_CASE);
        $this ->  getComment();
    }

    public function addFunder() {

        $this->dataset->funders()->attach($this->funderID,['comment'=>$this->comment]);
        $this->refresh();
    }

    public function removeFunder($id)
    {

        $this->dataset->funders()->detach($id);
        $this->refresh();

    }
    public function render()
    {
        return view('livewire.input.funders');
    }
}

