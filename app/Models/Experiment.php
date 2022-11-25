<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    use HasFactory;

    // An experiment has many images
    public function images()
    {
        return $this -> hasMany(Image::class);
    }

    public function datasets()
    {
        return $this -> hasMany(Dataset::class, 'experiment_id');
    }
}
