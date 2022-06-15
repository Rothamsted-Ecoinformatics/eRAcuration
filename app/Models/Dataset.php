<?php

namespace App\Models;


use App\Models\Experiment;
use App\Models\DocumentSubjects;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    
    protected $table = 'metadata_document';
    protected $connection = 'sqlsrv';

    public function admingrt() {
        return $this->belongsTo(Admingrt::class, 'general_resource_type_id');
    }

    public function experiment() {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, DocumentSubjects::class, 'document_id', 'subject_id');
    }


}
