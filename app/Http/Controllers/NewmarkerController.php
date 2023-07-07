<?php

namespace App\Http\Controllers;

use App\Models\Newmarker;
use Illuminate\View\View;

class NewmarkerController extends Controller
{
    public function show(): View
    {
        $newmarkers = Newmarker::orderBy('position')->get();

        return view('users.index', [
            'newmarkers' => $newmarkers,
        ]);
    }
}
