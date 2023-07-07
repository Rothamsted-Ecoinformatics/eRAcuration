<?php

namespace App\Http\Controllers;

use App\Models\Experiment;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $images = Image::orderBy('file_location') ->get();
        //$codes = Image::distinct('experiment_code')->pluck('experiment_code');
        //dd($codes);
        return view('images.index', [
            //'codes' => $codes,
            //'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TO DO - save the image
        return redirect('/images');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::find($id);
        //dd($image);
        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = Image::where('id', $id)
        ->update([
            'caption' => $request->input('caption'),
            'description' => $request->input('description'),
            'orientation' => $request->input('orientation'),
            'is_www' => $request->input('forWWW'),
            'is_reviewed' => $request->input('isReviewed'),
        ]);

        return redirect('/images');
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
