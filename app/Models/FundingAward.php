<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingAward extends Model
{
    use HasFactory;

    protected $table = 'funding_awards';

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'organisation_id');
    }
}
