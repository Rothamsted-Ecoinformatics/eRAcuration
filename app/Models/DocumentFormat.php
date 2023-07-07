<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFormat extends Model
{
    use HasFactory;

    protected $table = 'document_formats';

    protected $primaryKey = 'id';

    public $incrementing = false;
}
