<?php

namespace App\Http\Livewire\Add;
use App\Models\Dataset;
use Livewire\Component;

class DatasetFromTemplate extends Component
{
    public $template_id;
    public $title;
    public $identifier = "10.23637/";

    public function mount() {
        $this->identifier = "10.23637/";

    }

    public function addDataset()
    {
        $template = Dataset::findOrFail($this->template_id);
        $newDataset = $template->duplicate();
        $newDataset->identifier = $this->identifier;
        $newDataset->title = $this->title;
        $newDataset->is_ready = 1;
        //$newDataset->old_id = 1;
        $newDataset->doi_created = null;
        $newDataset->save();

        return redirect()->route('datasets.edit', $newDataset->id);
    }

    public function render()
    {
        return view('livewire.add.dataset-from-template');
    }
}
