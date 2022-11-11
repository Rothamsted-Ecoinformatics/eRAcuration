<?php

namespace App\Http\Livewire\Input;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\DocumentFile;
use Livewire\WithFileUploads;

class AssociatedFiles extends Component
{
    use WithFileUploads;

    public $dataset;
    public $dataset_id;
    public int $size_value = 0;
    public string $document_unit_id = 'KB';
    public string $file_name = '';
    public string $title = '' ;
    public int $is_illustration = 0;



    public function mount() {
        $this->dataset = Dataset::find($this->dataset_id);
    }

    public function refresh() {

        $this->dataset = Dataset::find($this->dataset_id);
        $this->reset(['file_name', 'document_unit_id','size_value', 'is_illustration', 'title']);
    }

    public function addDocumentFile() {
/* extract some information from the download button which is not really a download button? */
$document_format_id = explode('.', $this->file_name);
//dd($document_format_id[1]);
$doc_file = new DocumentFile;
        $doc_file->metadata_document_id = $this->dataset_id;
        $doc_file->size_value = $this->size_value;
        $doc_file->document_unit_id = $this->document_unit_id;
        $doc_file->document_format_id = $document_format_id[1];
        $doc_file->file_name = $this->file_name;
        $doc_file->title = $this->title;
        $doc_file->is_illustration = $this->is_illustration;
        $doc_file->save();
        $this->refresh();

    }



    public function removeDocumentFile($id)
    {
        $deletedID = DocumentFile::find($id)->delete();

        $this->refresh();

    }
    public function render()
    {
        return view('livewire.input.associated-files');
    }
}
