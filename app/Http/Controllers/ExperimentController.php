<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Experiment;
use App\Models\Field;
use Illuminate\Http\Request;

class ExperimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $experiments = Experiment::orderBy('code')->get();

        return view('experiments.index', [
            'experiments' => $experiments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $experiment = Experiment::find($id);
        $fields = Field::all();

        return view('experiments.edit', [
            'experiment' => $experiment,
            'fields' => $fields,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
