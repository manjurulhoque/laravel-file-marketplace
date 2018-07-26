<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function show(File $file)
    {
//        $file = $this->replaceFilePropertiesWithUnapprovedChanges($file);
//
//        return view('files.show', [
//            'file' => $file,
//            'uploads' => $file->uploads
//        ]);
    }
}
