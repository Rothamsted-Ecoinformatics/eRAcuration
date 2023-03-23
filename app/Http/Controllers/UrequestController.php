<?php

namespace App\Http\Controllers;

use App\Models\Urequest;
use Illuminate\Http\Request;

class UrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urequests = Urequest::all();

        return view('users.urequests', [
            'urequests' => $urequests,
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
     * @param  \App\Models\Urequest  $urequest
     * @return \Illuminate\Http\Response
     */
    public function show(Urequest $urequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urequest  $urequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Urequest $urequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urequest  $urequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urequest $urequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urequest  $urequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urequest $urequest)
    {
        //
    }
}
