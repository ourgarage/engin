<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Response;

class FilesUploadRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'upload' => 'image|max:10240',
        ];

        return $rules;
    }

    public function response(Array $errors, Request $request)
    {
        //return Response::json($errors->first());
        //$file = '/upload/' . md5(date("YmdHis") . rand(5, 50)) . '.' . $request->file('upload')->getClientOriginalExtension();
        //return "<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" . $request->CKEditorFuncNum . ",  \"" . $file . "\", \"" . $errors->first() . "\");</script>";
    dd($request->all());
    }
}
