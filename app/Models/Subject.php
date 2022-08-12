<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;    
    /**
     * The documents that that belong to the subjects.
     */
    public function datasets()
    {
        return $this->belongsToMany(Dataset::class, 'document_subjects', 'subject_id', 'metadata_document_id');
    }

    public function subject_schemas() {
        return $this->belongsTo(SubjectSchema::class, 'subject_schemas_id');
    }
}
