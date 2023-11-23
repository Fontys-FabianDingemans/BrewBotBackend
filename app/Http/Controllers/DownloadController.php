<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{

    public function app(Request $request)
    {
        $file = resource_path('downloads/BrewBot.apk');
        if (!file_exists($file)) abort(404);
        return response()->download($file, 'BrewBot.apk', [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }

}
