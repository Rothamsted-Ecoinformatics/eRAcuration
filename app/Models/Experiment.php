<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experiment extends Model
{
    use HasFactory;

    protected $table = 'experiments';
    protected $primaryKey = 'id';

    // An experiment has many images
    public function images()
    {
        return $this -> hasMany(Image::class);
    }
}
