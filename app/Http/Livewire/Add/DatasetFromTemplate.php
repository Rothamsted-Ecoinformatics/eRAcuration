<?php

namespace App\Http\Livewire\Add;
use App\Models\Dataset;
use Livewire\Component;

class DatasetFromTemplate extends Component
{
    public $template_id;
    public $title;
    public $identifier = "10.23637/";
    public $shortname;
    public $exptCode;
    public $url;
    public $version;

    public function mount() {

        $template = Dataset::findOrFail($this->template_id);
        $this->version = $template->version + 1;
        $this->exptCode = strtolower(str_replace("/", "",$template->experiment->code ));
        $this->shortname = $template->short_name;
        $this->identifier = "10.23637/".$this->exptCode.'-'.$this->shortname.'-'.$this->version;
        if ($template->general_resource_type_id == 4)
        {
            $format = 'https://www.era.rothamsted.ac.uk/dataset/%1$s/%2$02d-%3$s';
            $this->url = sprintf($format, strtolower($this->exptCode), $this->version, $this->shortname);
        }

    }

    public function addDataset()
    {
        $template = Dataset::findOrFail($this->template_id);

        if ($template->general_resource_type_id == 4)
{
    $format = 'https://www.era.rothamsted.ac.uk/dataset/%1$s/%2$02d-%3$s';
    $this->url = sprintf($format, strtolower($this->exptCode), $this->version, $this->shortname);
}
else
{

}
        $this->validate( [
            'title' => 'required|max:100',
            'identifier' =>['bail','required','doesnt_end_with:"10.23637/"','unique:App\Models\Dataset,identifier'],
            'url' => ['unique:App\Models\Dataset,url']

        ]);

        $template = Dataset::findOrFail($this->template_id);
        $newDataset = $template->duplicate();
        $newDataset->url = $this->url;
        $newDataset->identifier = $this->identifier;
        $newDataset->title = $this->title;
        $newDataset->short_name = $this->shortname;
        $newDataset->version = $this->version;
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
