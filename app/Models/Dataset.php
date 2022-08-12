<?php

namespace App\Models;


use App\Models\Experiment;

use App\Models\GeneralResourceType;
use App\Models\Publisher;
use App\Models\Person;
use App\Models\PersonRole;
use App\Models\SpecificResourceType;
use App\Models\DocumentFormat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use HasFactory;
    protected $connection = 'sqlsrv';

    protected $table = 'metadata_documents';
    public $timestamps = false;
    
    public function experiment() {
        return $this->belongsTo(Experiment::class, 'experiment_id');
    }
    public function general_resource_type() {
        return $this->belongsTo(GeneralResourceType::class, 'general_resource_type_id');
    }
    public function specific_resource_type() {
        return $this->belongsTo(SpecificResourceType::class, 'specific_resource_type_id');
    }
    public function document_format() {
        return $this->belongsTo(DocumentFormat::class, 'document_format_id');
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'document_subjects', 'metadata_document_id', 'subject_id');
    }
    public function dates()
    {
        return $this->belongsToMany(DateType::class, 'document_dates', 'metadata_document_id', 'date_type_id')
        ->withPivot('document_date')
        ->as('history');
    }
    public function funders()
    {
        return $this->belongsToMany(FundingAward::class, 'document_funders', 'metadata_document_id', 'funding_award_id');
    }
    public function authors()
    {
        return $this->belongsToMany(Person::class, 'person_creators', 'metadata_document_id', 'person_id');
    }
    public function authorOrgs()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_creators', 'metadata_document_id', 'organisation_id');
    }
    //this contributors is a bit more complicated because I need to fetch teh role through the roletype. 
    public function contributors()
    {
        return $this->belongsToMany(Person::class, 'person_roles', 'metadata_document_id', 'person_id')
        ->withPivot('person_role_type_id')
    ;
        
    }

}
