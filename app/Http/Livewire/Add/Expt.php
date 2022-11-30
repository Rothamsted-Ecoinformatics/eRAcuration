<?php

namespace App\Http\Livewire\Add;

use Livewire\Component;
use App\Models\Experiment;
use App\Models\Field;


class Expt extends Component
{
    public $experiment;
    public $code;
    public $name;
    public $folder;
    public $glten_id;
    public $field_id;
    public $key_ref_code;
    public $message = "";


    public function mount() {
        $this->fields = Field::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function refresh() {

        $this->experiment = "";
        $this->code = "";
        $this->name = "";
        $this->folder = "";
        $this->glten_id = "";
        $this->key_ref_code= "";
        $this->field_id;

    }

    public function addExpt() {

        $isIn = Experiment::where('folder',$this->folder)
        ->orWhere('code',$this->code)->count();

        if ($isIn>0) {
            $this->message = "Already in the table";
        }
        else {
        $sub_id = new Experiment;
        $sub_id->glten_id = $this->glten_id;
        $sub_id->code = $this->code;
        $sub_id->folder = $this->folder;
        $sub_id->name = $this->name;
        $sub_id->field_id = $this->field_id;

        $sub_id->save();
        $this->message = "Added";
        }
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.add.expt');
    }
}
