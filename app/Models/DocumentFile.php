<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    use HasFactory;
    protected $table = 'document_files';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
