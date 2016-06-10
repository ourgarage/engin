<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class FilesUploadRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'upload' => 'image|max:10240',
        ];

        return $rules;
    }

    public function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$this->CKEditorFuncNum.'", "", "'.$error.'")</script>';
        }

        return $validator->errors()->getMessages();
    }
}
