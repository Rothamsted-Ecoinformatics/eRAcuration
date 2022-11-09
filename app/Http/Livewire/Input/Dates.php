<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\DateType;

class Dates extends Component
{


    public $dataset;
    public $dataset_id;
    public $date_type_id;
    public $selected_date;
    public $date_types;

    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->date_types = DateType::all()->sortBy('type_value');

    }

    public function refresh() {
        $this->dataset = Dataset::find($this->dataset_id);
    }

    public function addDate() {

        $this->dataset->dates()->attach($this->date_type_id, ['document_date'=>$this->selected_date]);
        $this->refresh();

    }

    public function removeDate($id)
    {

        $this->dataset->dates()->detach($id);
        $this->refresh();

    }
    public function render()
    {
        return view('livewire.input.dates');
    }
}
