<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function store (Request $request)
    {
        if ($request->hasFile('gdpr')) {
            $file = $request->file('gdpr');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('gdpr/tmp' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);
            
            return $folder;
        }

        return '';
    }
}
