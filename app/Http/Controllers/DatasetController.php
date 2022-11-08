<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Dataset;
use App\Models\DateType;
use App\Models\DocumentFile;
use App\Models\DocumentFormat;
use App\Models\Experiment;
use App\Models\Organisation;
use App\Models\FundingAward;
use App\Models\SpecificResourceType;
use App\Models\Subject;
use App\Models\Person;
use App\Models\PersonRole;
use App\Models\PersonRoleType;
use App\Models\RelatedIdentifier;
use App\Models\IdentifierType;
use App\Models\RelationType;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataset  = Dataset::orderBy('id') ->get();

        return view('datasets.index', [
            'dataset' => $dataset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experiments = Experiment::where('glten_id', '>', 0)
        ->orWhere('code', 'like', '%MS%')
        ->orderBy('code') ->get();

        $subjects = Subject::all();

        return view('datasets.create', [
            'experiments' => $experiments,
            'subjects' => $subjects
        ]);
    }


    /**
     * getData :  will collect the data needed for the functions show, edit, and copy.
     * this is an attempt as not repeating myself.
     *
     * @param  mixed $id
     * @return void
     */
    public function getData($id)
    {
        //these are specific to the ID
        $dataset = Dataset::find($id);
        $allSubjects = Subject::all()->sortBy('subject', SORT_NATURAL|SORT_FLAG_CASE);
        $date_types = DateType::all()->sortBy('type_value');
        $awards = FundingAward::all()->sortBy('abbreviation');
        $persons = Person::all()->sortBy('family_name');
        $experiments = Experiment::where('glten_id', '>', 0)
        ->orWhere('code', 'like', '%MS%')
        ->orderBy('code')
        ->get();
        $document_formats = DocumentFormat::orderby('id')->get();
        $specific_resource_types = SpecificResourceType::orderBy('type_value')->get();
        $organisations = Organisation::all();
        $person_role_types = PersonRoleType::all()->sortBy('type_value');
        $identifier_types = IdentifierType::all()->sortBy('id');
        $relation_types = RelationType::all()->sortBy('type_value');

        $arrData= [
            'dataset' => $dataset,
            'allSubjects' => $allSubjects,
            'organisations' => $organisations,
            'experiments' => $experiments,
            'specific_resource_types' => $specific_resource_types,
            'document_formats' => $document_formats,
            'identifier_types' => $identifier_types,
            'persons' => $persons,
            'person_role_types' => $person_role_types,
            'awards' => $awards,
            'relation_types' => $relation_types,
            'date_types' => $date_types,
        ];

        return  $arrData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrData = $this-> getData($id);

        return view('datasets.show', $arrData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $arrData = $this-> getData($id);
        //dd($arrData);

        return view('datasets.edit', $arrData);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*
URL: Is there a case that the URL is actually made by formula? after all, we know what to do. Would avoid errors.
URL for dataset: www.era.rothamsted.ac.uk/dataset/experiment/2digitVersion-short_name
doi_created: Actually, if there is a change, the DOI-Created needs to be deleted - so that the thing can be reminted
created_at: timestamps
updated_at: timestamps
*/
//TODO: validation rules:

        $validated = $request->validate([
            'title' => 'required',
            'experiment_id' => 'required',
            'publisher_id'=> 'required',
            'description_abstract' => 'required',
        ]);
$exptCode = Experiment::where('id',  $request-> input('experiment_id'))->get();
$version = $request -> input('version');
$code = strtolower(str_replace("/", "", $exptCode[0]['code']));
$shortname = $request -> input('short_name');
$filename = "ExtractFileName.pdf";

if ($request->general_resource_type_id == 4)
{
    $format = 'http://www.era.rothamsted.ac.uk/dataset/%1$s/%2$02d-%3$s';
    $formattedURL = sprintf($format, $code, $version, $shortname);
}
else
{
    $format = 'http://www.era.rothamsted.ac.uk/metadata/%1$s/%2$s';
    $formattedURL = sprintf($format, $code, $filename);
}
        $exptCode = Experiment::where('id',  $request-> input('experiment_id'))->get();
        //dd($exptCode);
        Dataset::where('id', $id)
        ->update([
            'experiment_id' => $request-> input('experiment_id'),
            'short_name' => $request-> input('short_name'),
            'url' => $formattedURL,
            'doi_created' => '', // this blanks the DOI created field, so now the DOI will be minted again
            'description_toc' => $request-> input('description_toc')." " ,
            'description_technical_info' => $request-> input('description_technical_info')." ",
            'description_quality' => $request-> input('description_quality')." ",
            'description_provenance' => $request-> input('description_provenance')." ",
            'description_methods' => $request-> input('description_methods')." ",
            'description_abstract' => $request-> input('description_abstract')." ",
            'description_other' => $request-> input('description_other')." ",
            'document_format_id' => $request -> input('document_format_id')." ",
            'publication_year' => $request -> input('publication_year')." ",
            'dataset_type' => $request -> input('dataset_type'),
            'title' => $request -> input('title')." ",
            'publisher_id' => $request -> input('publisher_id'),
            'general_resource_type_id' => $request -> input('general_resource_type_id'),
            'specific_resource_type_id' => $request -> input('specific_resource_type_id'),
            'grade' => $request -> input('grade'),
            'is_ready' => $request -> input('is_ready'),
            'is_external' => $request -> input('is_external'),
            'lang' => $request -> input('lang'),
            'version' => $request -> input('version'),
            'rights_text' => $request -> input('rights_text')." ",
            'rights_licence_uri' => $request -> input('rights_licence_uri')." ",
            'rights_licence' => $request -> input('rights_licence')." "
        ]);

        Dataset::where('id', $id)->first()->funders()->sync($request->funders);

        $edContributors = array();
        if (isset($request->contributors))
        {
            foreach ($request->contributors as $contributor) {
            $edContributors[$contributor["'person_id'"]]['person_role_type_id']=$contributor["'person_role_type_id'"];
            }
            Dataset::where('id', $id)->first()->contributors()->sync($edContributors);
        }
        // we delete the old ones,
        RelatedIdentifier::where('metadata_document_id', $id)->delete();
        // transform the request and insert
        if (isset($request->new_related_identifiers))
        {
            $insertRelatedIdentifiers = $request->new_related_identifiers;

            $allRelId = [];
            foreach ($insertRelatedIdentifiers as $item)
            {
                $RelId = new RelatedIdentifier();
                $RelId->identifier = $item["'identifier'"];
                $RelId->metadata_document_id = $item["'metadata_document_id'"];
                $RelId->relation_type_id = $item["'relation_type_id'"];
                $RelId->identifier_type_id = $item["'identifier_type_id'"];
                $RelId->name = $item["'name'"];
                $allRelId = $RelId->attributesToArray();
                RelatedIdentifier::insert($allRelId);
            }
        }

        //---- now to deal with files new_document_file
        //we delete the old ones:
        DocumentFile::where('metadata_document_id', $id)->delete();

        $insertAssocFiles = $request->new_document_file;
        if (isset($request->new_document_file))
        {
            $allAssocFiles = [];
            foreach ($insertAssocFiles as $item)
            {
                $fileParts =explode(".", $item["'file_name'"]);
                $extension = end($fileParts);
                $AssocFile = new DocumentFile();
                $AssocFile->size_value = $item["'size_value'"];
                $AssocFile->metadata_document_id =$id;
                $AssocFile->document_unit_id = $item["'document_unit_id'"];
                $AssocFile->document_format_id = $extension;
                $AssocFile->file_name = $item["'file_name'"];
                $AssocFile->title = $item["'title'"];
                $AssocFile->is_illustration = $item["'is_illustration'"];
                $allAssocFiles = $AssocFile->attributesToArray();
                DocumentFile::insert($allAssocFiles);
            }
        }
        return redirect ('/datasets/'.$id);
    }

    /**
     *
     * Copy is a way to use an existing item as a template to make a new one.
     * So we have a copy form filled in with selected fields from the ID, but it is then passed to a Store that creates a new row.
     *
     * consider using the function "replicate and then send to the edit and save"
     */
    public function copy($id)
    {
        //consider using replicate function then the edit and save so that save on forms. :)
        // https://medium.com/@imanborumand/8-interesting-functions-of-laravel-eloquent-orm-783df3e41b81
        $arrData = $this-> getData($id);
        return view('datasets.copy', $arrData)
     ;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
