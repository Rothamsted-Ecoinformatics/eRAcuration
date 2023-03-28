<?php

namespace App\Http\Livewire\Add;

use Livewire\Component;
use App\Models\Experiment;
use App\Models\Field;


class Expt extends Component
{
    public $experiment;
    public $editType;
    public $code;
    public $name;
    public $folder;
    public $fields;
    public ?int $glten_id = null;
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

            if (!preg_match("/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b /", $this->code, $capt)) {
                $this->message = "Not a valid code";
            }
        $sub_id = new Experiment;
        $sub_id->glten_id = $this->glten_id;
        $sub_id->code = strtoupper($this->code);
        $sub_id->folder = str_replace('/','',$this->code);
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
