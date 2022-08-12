<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vwCrop extends Model
{
    use HasFactory;
    
    
    protected $connection = 'sqlsrv';
    protected $table = "vw_crops";

    /*
    public function subject_schemas() {
        return $this->belongsTo(SubjectSchema::class, 'subject_schemas_id');
    }
    */
    
}
