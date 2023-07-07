<?php

namespace App\Http\Livewire\Input;

use App\Models\Dataset;
use App\Models\DateType;
use Livewire\Component;

class Dates extends Component
{
    public $dataset;

    public $dataset_id;

    public $date_type_id = 8;

    public $selected_date;

    public $date_types;

    protected $rules = [
        'selected_date' => 'before:tomorrow',
        'date_type_id' => 'required',
    ];

    public function mount()
    {
        $this->dataset = Dataset::find($this->dataset_id);
        $this->date_types = DateType::all()->sortBy('type_value');
        $this->selected_date = date('Y-m-d');
    }

    public function refresh()
    {
        $this->dataset = Dataset::find($this->dataset_id);
    }

    public function addDate()
    {
        $this->validate();

        $this->dataset->dates()->attach($this->date_type_id, ['document_date' => $this->selected_date]);
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
