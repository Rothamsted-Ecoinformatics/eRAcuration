<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
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
    public function index(): View
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
    public function create(): View
    {
        return view('images.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
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
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): View
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
    public function update(Request $request, int $id): RedirectResponse
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
    public function destroy(int $id)
    {
        //
    }
}
