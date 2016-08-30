<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Notifications;
use App\Http\Requests\Request;

class AdminCreateRequest extends Request
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(is_null($this->route('id'))){
            $rules = [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:300'
            ];
        } else {
            $rules = [
                'password' => 'required_if:change_password,on|min:6|max:300',
            ];
        }

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