<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\Request;
use Notifications;

class ResendRegisterConfirmEmailPostRequest extends Request
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'email' => 'required|email|exists:users,email,status,pending'
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
            Notifications::add($error, 'danger');
        }

        return $validator->errors()->getMessages();
    }


}
