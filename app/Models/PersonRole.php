<?php

namespace App\Models;
use App\Models\PersonRoleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PersonRole extends Pivot
{
    use HasFactory;
    protected $table='person_roles';
    protected $connection = 'sqlsrv';
    public $timestamps = false;

    public function person_role_type() {
        return $this->belongsTo(PersonRoleType::class, 'person_role_type_id');
    }

}

