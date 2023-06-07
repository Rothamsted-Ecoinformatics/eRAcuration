<?php

namespace App\Http\Livewire\Add;

use Livewire\Component;
use App\Models\SubjectSchema;
use App\Models\Subject;

class Keyword extends Component
{
    public $subject;
    public $uri;
    public $schemas;
    public $schema_id;
    public $message = "";

    protected $rules = [
        'subject' => 'required|max:100',
        'uri' => 'required',
        'schema_id' => 'required|integer',

    ];


    public function mount() {
        $this->schemas = SubjectSchema::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
    }

    public function refresh() {
        $this->schemas = SubjectSchema::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $this->subject = "";
        $this->uri = "";
    }

    public function addSubject() {
        $this->validate();
        $isIn = Subject::where('subject',$this->subject)
        ->orWhere('uri',$this->uri)->count();

        if ($isIn>0) {
            $this->message = "Already in the table";
        }
        else {
        $sub_id = new Subject;
        $sub_id->subject_schemas_id = $this->schema_id;
        $sub_id->uri = $this->uri;
        $sub_id->subject = $this->subject;
        $sub_id->save();
        $this->message = "Added";
        }
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.add.keyword');
    }
}
