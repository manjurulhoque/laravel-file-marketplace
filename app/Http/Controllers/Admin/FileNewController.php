<?php

namespace App\Http\Controllers\Admin;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileNewController extends Controller
{
    public function index()
    {
        $files = File::unapproved()->finished()->oldest()->get();
        return view('admin.files.new.index')->withFiles($files);
    }

    public function update(File $file)
    {
        $file->approve();

        return back()->withSuccess("{$file->title} has been approved");
    }

    public function destroy(File $file)
    {
        $file->delete();
        $file->uploads->each->delete();

        //Mail::to($file->user)->send(new FileRejected($file));

        return back()->withSuccess("{$file->title} has been rejected");
    }
}
