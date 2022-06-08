<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admingrt extends Model
{
    use HasFactory;
    protected $table = 'general_resource_types';
    protected $primaryKey = 'grt_id';

}
