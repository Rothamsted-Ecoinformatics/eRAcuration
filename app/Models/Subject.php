<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';

    /**
     * The documents that that belong to the subjects.
     */
    public function datasets()
    {
        return $this->belongsToMany(Dataset::class, 'document_subjects', 'subject_id', 'document_id');
    }
}
