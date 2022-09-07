<?php

namespace App\Models;
use App\Models\RelationType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedIdentifier extends Model
{
    use HasFactory;
    protected $table = 'related_identifiers';

    public function  relation_type()
    {
        return $this->belongsTo(RelationType::class);
    }


}
