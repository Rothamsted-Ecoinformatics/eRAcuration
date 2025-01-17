<?php
namespace App\Http\Controllers;

use App\Http\Livewire\Input\AssociatedFiles;
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
use App\Models\Publisher;
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
        ->orWhere('code', 'like', '%DOCS%')
        ->orWhere('code', 'like', '%WASTE%')
        ->orderBy('code')
        ->get();
        $document_formats = DocumentFormat::orderby('id')->get();
        $specific_resource_types = SpecificResourceType::orderBy('type_value')->get();
        $organisations = Organisation::all();
        $person_role_types = PersonRoleType::all()->sortBy('type_value');
        $identifier_types = IdentifierType::all()->sortBy('id');
        $relation_types = RelationType::all()->sortBy('type_value');
        $publishers = Publisher::all()->sortBy('name');
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
            'publishers'=>$publishers,
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
        $template = Dataset::findOrFail($request->templateID);
        $newDataset = $template->duplicate();
        $newDataset->identifier = $request->identifier;
        $newDataset->title = $request->title;
        $newDataset->is_ready = 1;
        $newDataset->old_id = 1;
        $newDataset->doi_created = null;
        $newDataset->save();

        return redirect()->route('datasets.edit', $newDataset->id);
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

        $request->validate([
            'title' => 'required',
            'experiment_id' => 'required',
            'publisher_id'=> 'required',
            'description_abstract' => 'required',
        ]);
$exptCode = Experiment::where('id',  $request-> input('experiment_id'))->get();
$version = $request -> input('version');
$code = strtolower(str_replace("/", "", $exptCode[0]['code']));
$shortname = $request -> input('short_name');
$files = DocumentFile::where('metadata_document_ID', $id)->get();

if(count($files)>0) {$filename =$files[0]['file_name'];} else {$filename="NOTSUPPLIED";}


if ($request->general_resource_type_id == 4)
{
    $format = 'https://www.era.rothamsted.ac.uk/dataset/%1$s/%2$02d-%3$s';
    $formattedURL = sprintf($format, $code, $version, $shortname);
}
else
{
    $format = 'https://www.era.rothamsted.ac.uk/metadata/%1$s/%2$s';
    $formattedURL = sprintf($format, $code, $filename);
}
        $exptCode = Experiment::where('id',  $request-> input('experiment_id'))->get();
        //dd($exptCode);
        Dataset::where('id', $id)
        ->update([
            'experiment_id' => $request-> input('experiment_id'),
            'short_name' => $request-> input('short_name'),
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
//             'url' => $formattedURL,
if ($request -> input('is_external') == 0) {
    Dataset::where('id', $id)
        ->update(['url' => $formattedURL]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function recycle($id)
    {
        Dataset::where('id', $id)
        ->update([
            'experiment_id' => 36
        ]);


        return redirect ('/datasets/');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
