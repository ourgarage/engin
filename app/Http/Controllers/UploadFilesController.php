<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UploadFilesController extends Controller
{
    public function uploadFiles($file)
    {
        return $file;
    }
}
