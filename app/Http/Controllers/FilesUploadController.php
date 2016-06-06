<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class FilesUploadController extends Controller
{

    public function upload(Request $request)
    {
        $callback = $_GET['CKEditorFuncNum'];
        $error = '';
        $file = $request->file('upload');
        $filename = md5(date("YmdHis") . rand(5, 50));
        $extension = $file->getClientOriginalExtension();
        $path = public_path('/upload/');
        $file->move($path, $filename . "." . $extension);
        $http_path = '/upload/' . $filename . "." . $extension;

        return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" . $callback . ",  \"" . $http_path . "\", \"" . $error . "\" );</script>";
    }

}
