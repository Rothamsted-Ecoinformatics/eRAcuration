<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    
    
    protected $connection = 'sqlsrv';
    protected $table = "crops";

    
    public function subject_schemas() {
        return $this->belongsTo(SubjectSchema::class, 'subject_schemas_id');
    }
    
}
