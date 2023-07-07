<?php

namespace App\Http\Controllers;

use App\Models\Experiment;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
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
     */
    public function create(): View
    {
        return view('images.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //TO DO - save the image
        return redirect('/images');
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
        $image = Image::find($id);
        //dd($image);
        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified resource in storage.
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
