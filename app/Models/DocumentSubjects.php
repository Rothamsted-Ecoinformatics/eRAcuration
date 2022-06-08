<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSubjects extends Model
{
    use HasFactory;
    protected $table = "document_subjects";
    protected $primaryKey = 'ds_id';
    protected $fillable = ["subject_id", "document_id"];


}
