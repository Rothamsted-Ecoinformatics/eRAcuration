<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Download;

class DownloadController extends Controller
{
    public function show(): View
    {
        $downloads = Download::where('dlresult', 'LIVE')->orderBy('dldate', 'DESC')->get();

        return view('users.downloads', [
            'downloads' => $downloads,
        ]);
    }
}
