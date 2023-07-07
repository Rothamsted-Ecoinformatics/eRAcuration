<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
