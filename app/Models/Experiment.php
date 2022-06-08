<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experiment extends Model
{
    use HasFactory;

    protected $table = 'experiment';
    protected $primaryKey = 'experiment_id';
}
