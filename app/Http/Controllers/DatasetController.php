<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Dataset;
use App\Models\Experiment;
use App\Models\Subject;

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
        $experiments = Experiment::where('GLTENID', '>', 0)
        ->orWhere('experiment_code', 'like', '%MS%')
        ->orderBy('experiment_code') ->get();
        
        $subjects = Subject::all();
        
        return view('datasets.create', [
            'experiments' => $experiments,
            'subjects' => $subjects
        ]);
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
        $dataset = Dataset::find($id);
        $subjects = Dataset::findOrFail($id)->subjects()->get();

        
        $experiments = Experiment::where('GLTENID', '>', 0)
        ->orWhere('experiment_code', 'like', '%MS%')
        ->orderBy('experiment_code') 
        ->get();
        
        return view('datasets.show', [
            'dataset' => $dataset,
            'experiments' => $experiments,
            'subjects' => $subjects
        ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataset = Dataset::find($id);
       
        $subjects = Dataset::findOrFail($id)->subjects()->get();
        $experiments = Experiment::where('GLTENID', '>', 0)
        ->orWhere('experiment_code', 'like', '%MS%')
        ->orderBy('experiment_code') 
        ->get();
        
        return view('datasets.edit', [
            'dataset' => $dataset,
            'experiments' => $experiments,
            'subjects' => $subjects
        ]) ;
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
URL: DO NOT EDIT HERE
publisher: not now
doi_created: Filled in by other tool
created_at: timestamps
updated_at: timestamps

*/      


        $dataset = Dataset::where('id',$id) 
        ->update([
            'lte_id' => $request-> input('lte_id'),
            'short_name' => $request-> input('short_name'),
            'description_toc' => $request-> input('description_toc')." " ,
            'description_technical_info' => $request-> input('description_technical_info')." ",
            'description_quality' => $request-> input('description_quality')." ",
            'description_provenance' => $request-> input('description_provenance')." ",
            'description_methods' => $request-> input('description_methods')." ",
            'description_abstract' => $request-> input('description_abstract')." ",
            'description_other' => $request-> input('description_other')." ",
            'publication_year' => $request -> input('publication_year')." ",
            'dstype' => $request -> input('dstype'),
            'title' => $request -> input('title')." ",
            'format_id' => $request -> input('format_id'),
            'grt_id' => $request -> input('grt_id'),
            'srt_id' => $request -> input('srt_id'),
            'fa_id' => $request -> input('fa_id'),
            'grade' => $request -> input('grade'),
            'isReady' => $request -> input('isReady'),
            'isExternal' => $request -> input('isExternal'),
            'language' => $request -> input('language'),
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
     */
    public function copy($id)
    {
         
        $dataset = Dataset::find($id);
        $subjects = Dataset::findOrFail($id)->subjects()->get();
        $experiments = Experiment::where('GLTENID', '>', 0)
        ->orWhere('experiment_code', 'like', '%MS%')
        ->orderBy('experiment_code') 
        ->get();
        
        return view('datasets.copy', [
            'dataset' => $dataset,
            'experiments' => $experiments,
            'subjects' => $subjects
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
