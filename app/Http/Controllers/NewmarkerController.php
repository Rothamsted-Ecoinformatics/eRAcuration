<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Newmarker;

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
