<?php

namespace App\Http\Controllers;

use App\Models\Urequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
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
    public function show(Urequest $urequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Urequest $urequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urequest $urequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Urequest $urequest)
    {
        //
    }
}
