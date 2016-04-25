<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Notifications;
use App\Http\Requests\Request;

class UserRegisterPostRequest extends Request
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:4|max:26',
            'email' => 'required|email|unique:users,email|min:6|max:300',
            'password' => 'required|confirmed|min:6|max:300',
            'rules' => 'required',
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
            Notifications::add($error, 'error');
        }

        return $validator->errors()->getMessages();
    }


}
