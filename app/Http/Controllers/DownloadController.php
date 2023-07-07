<?php

namespace App\Http\Controllers;

use App\Models\Download;

class DownloadController extends Controller
{
    public function show()
    {
        $downloads = Download::where('dlresult', 'LIVE')->orderBy('dldate', 'DESC')->get();

        return view('users.downloads', [
            'downloads' => $downloads,
        ]);
    }
}
