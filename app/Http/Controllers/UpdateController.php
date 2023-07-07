<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('updates.index', [
            //'codes' => $codes,
            //'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('updates.create'); //
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
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     */
    public function edit(Update $id): View
    {
        $update = Update::find($id);

        return view('updates.edit')->with('update', $update);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
