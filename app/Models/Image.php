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
    ];

    //In our story, an image belongs to one experiment although
    public function experiment()
    {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }

    public function image_type()
    {
        return $this->belongsTo(ImageType::class, 'image_type_id');
    }

    public function author()
    {
        return $this->belongsTo(Organisation::class, 'person_id');
    }
}
