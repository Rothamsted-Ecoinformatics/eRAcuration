<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newmarker;

class NewmarkerController extends Controller
{
    public function show()
    {
        $newmarkers = Newmarker::orderBy('position')->get();
        return view('users.index', [
            'newmarkers' => $newmarkers
        ]);
    }
}
