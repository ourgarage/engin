<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Notifications;
use App\Http\Requests\Request;

class AdminSiteSettingsRequest extends FormRequest
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
            'site_name' => 'required',
            'domain' => 'required|url',
            'slogan' => 'required',
            'copyright' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
        ];

        return $rules;
    }

    public function response(Array $errors)
    {
        return redirect()->back()->withInput();
    }

    public function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Notifications::danger($error, 'page');
        }

        return $validator->errors()->getMessages();
    }
}
