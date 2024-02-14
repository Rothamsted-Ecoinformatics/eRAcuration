<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\FundingAward;
class Funders extends Component
{
    public $funder;
    public $comment;
    public $dsfunderid;
    public $awards;
    public $filteredfunders;
    public $dataset;
    public $dataset_id;

    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsfunderid = Dataset::where('id', $this->dataset_id)->first()->funders()->pluck('funding_awards.id')->toArray();
        $this->awards = FundingAward::all()->whereNotIn('id', $this->dsfunderid)->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        //$this->awards = FundingAward::all()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);

    }

    public function refresh() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->dsfunderid = Dataset::where('id', $this->dataset_id)->first()->funders()->pluck('funding_awards.id')->toArray();
        $this->awards = FundingAward::all()->whereNotIn('id', $this->dsfunderid)->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
        //$this->awards = FundingAward::all()->sortBy('title', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function addFunder() {

        $this->dataset->funders()->attach($this->funder, ['comment'=>$this->comment]);
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
