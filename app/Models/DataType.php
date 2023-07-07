<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataType extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $table = 'data_types';

    public function subject_schemas()
    {
        return $this->belongsTo(SubjectSchema::class, 'subject_schemas_id');
    }
}
