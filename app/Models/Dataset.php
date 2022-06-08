<?php

namespace App\Models;

use App\Models\Admingrt;
use App\Models\Experiment;
use App\Models\DocumentSubjects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    
    protected $table = 'metadata_document';

    public function admingrt() {
        return $this->belongsTo(Admingrt::class, 'grt_id');
    }

    public function experiment() {
        return $this->belongsTo(Experiment::class, 'lte_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, DocumentSubjects::class, 'document_id', 'subject_id');
    }


}
