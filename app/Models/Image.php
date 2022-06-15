<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';

    protected $casts = 
    [
        'is_www' => 'boolean',
        'is_reviewed' => 'boolean',
        'is_gallery' => 'boolean',
    ];
    //In our story, an image belongs to one experiment although
    public function experiment()
    {
        return $this->belongsTo('App\Image', 'experiment_id');
    }
    
    public function image_type()
    {

    }

}
