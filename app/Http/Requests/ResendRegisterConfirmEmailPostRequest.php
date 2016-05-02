<?php

namespace App\Http\Requests;

use App\Models\User;
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
            'email' => 'required|email|exists:users,email,status,' . User::STATUS_PENDING . ''
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
