<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Dataset;
use App\Models\DocumentFile;
use App\Models\DocumentFormat;
use App\Models\Experiment;
use App\Models\Organisation;
use App\Models\SpecificResourceType;
use App\Models\Subject;
use App\Models\PersonRole;
use App\Models\PersonRoleType;

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
        $subjects = Dataset::findOrFail($id)->subjects()->get();
        $dates = Dataset::findOrFail($id)->dates()->get();
        $funders = Dataset::findOrFail($id)->funders()->get();
        $files = DocumentFile::where('metadata_document_id', $id)->get();
        $authors = Dataset::findOrFail($id)->authors()->get();
        $authorOrgs = Dataset::findOrFail($id)->authorOrgs()->get();
        //using the belongsToMany function
        $contributors = Dataset::findOrFail($id)
        ->contributors()
        ->get();
        //using PersonRole as a model
        //these are lists that are more general to use in Select statements
        $experiments = Experiment::where('glten_id', '>', 0)
        ->orWhere('code', 'like', '%MS%')
        ->orderBy('code')
        ->get();
        $document_formats = DocumentFormat::orderby('id')->get();
        $specific_resource_types = SpecificResourceType::orderBy('type_value')->get();
        $organisations = Organisation::all();

        $arrData= [
            'dataset' => $dataset,
            'subjects' => $subjects,
            'dates' => $dates,
            'funders' =>   $funders,
            'authors' => $authors,
            'authorOrgs' => $authorOrgs,
            'contributors' => $contributors,
            'organisations' => $organisations,
            'experiments' => $experiments,
            'specific_resource_types' => $specific_resource_types,
            'document_formats' => $document_formats,
            'files' => $files,
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
    {/*
URL: Is there a case that the URL is actually made by formula? after all, we know what to do. Would avoid errors.
URL for dataset: www.era.rothamsted.ac.uk/dataset/experiment/2digitVersion-shortname
doi_created: Actually, if there is a change, the DOI-Created needs to be deleted - so that the thing can be reminted
created_at: timestamps
updated_at: timestamps

*/
        $dataset = Dataset::where('id',$id)
        ->update([
            'experiment_id' => $request-> input('experiment_id'),
            'url' => $request-> input('url'),
            'short_name' => $request-> input('short_name'),
            'doi_created' => '',
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

        return redirect ('/datasets');
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
        $dataset = Dataset::find($id);
        //$subjects = Dataset::findOrFail($id)->subjects()->get();
        $experiments = Experiment::where('glten_id', '>', 0)
        ->orWhere('code', 'like', '%MS%')
        ->orderBy('code')
        ->get();

        return view('datasets.copy', [
            'dataset' => $dataset,
            'experiments' => $experiments,
            //'subjects' => $subjects
        ]) ;

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
