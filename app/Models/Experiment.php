<?php

namespace App\Models;
use App\Models\Field;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    use HasFactory;
    public $timestamps = false;

    // An experiment has many images
    public function images()
    {
        return $this -> hasMany(Image::class);
    }

    public function datasets()
    {
        return $this -> hasMany(Dataset::class, 'experiment_id');
    }
    public function field() {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
