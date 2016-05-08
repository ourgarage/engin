<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Notifications;
use App\Http\Requests\Request;

class AdministratorCreationPostRequest extends Request
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|max:300',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:300',
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
