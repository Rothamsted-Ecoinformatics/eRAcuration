<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\View\View;

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
