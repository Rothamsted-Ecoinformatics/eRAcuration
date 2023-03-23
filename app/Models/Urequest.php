<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urequest extends Model
{
    protected $connection = 'mysql';
    protected $table = 'urequests';
    use HasFactory;
}
